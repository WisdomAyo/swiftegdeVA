<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

/**
 * Secure File Upload Service
 * 
 * Provides secure file upload functionality with:
 * - Proper file permissions (0755 for directories, 0644 for files)
 * - File type validation
 * - Sanitized filenames
 * - Configurable storage location
 */
class FileUploadService
{
    /**
     * Allowed file extensions by category
     */
    protected array $allowedExtensions = [
        'image' => ['jpg', 'jpeg', 'png', 'gif', 'webp'],
        'document' => ['pdf', 'doc', 'docx', 'odt', 'xls', 'xlsx', 'ppt', 'pptx'],
        'video' => ['mp4', 'webm', 'mov'],
        'all' => ['jpg', 'jpeg', 'png', 'gif', 'webp', 'pdf', 'doc', 'docx', 'odt', 'xls', 'xlsx', 'ppt', 'pptx', 'mp4', 'webm', 'mov'],
    ];

    /**
     * Allowed MIME types by category
     */
    protected array $allowedMimeTypes = [
        'image' => ['image/jpeg', 'image/png', 'image/gif', 'image/webp'],
        'document' => [
            'application/pdf',
            'application/msword',
            'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            'application/vnd.oasis.opendocument.text',
            'application/vnd.ms-excel',
            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            'application/vnd.ms-powerpoint',
            'application/vnd.openxmlformats-officedocument.presentationml.presentation',
        ],
        'video' => ['video/mp4', 'video/webm', 'video/quicktime'],
    ];

    /**
     * Maximum file sizes in bytes by category
     */
    protected array $maxSizes = [
        'image' => 5 * 1024 * 1024,      // 5MB
        'document' => 10 * 1024 * 1024,   // 10MB
        'video' => 50 * 1024 * 1024,      // 50MB
    ];

    /**
     * Directory permission (owner: rwx, group: rx, others: rx)
     */
    protected int $directoryPermission = 0755;

    /**
     * File permission (owner: rw, group: r, others: r)
     */
    protected int $filePermission = 0644;

    /**
     * Upload a file securely
     *
     * @param UploadedFile $file The uploaded file
     * @param string $directory Target directory (relative to public path)
     * @param string $category File category for validation (image, document, video, all)
     * @param string|null $customName Optional custom filename (without extension)
     * @return array ['success' => bool, 'path' => string|null, 'error' => string|null]
     */
    public function upload(
        UploadedFile $file,
        string $directory,
        string $category = 'all',
        ?string $customName = null
    ): array {
        // Validate file extension
        $extension = strtolower($file->getClientOriginalExtension());
        $allowedExtensions = $this->allowedExtensions[$category] ?? $this->allowedExtensions['all'];
        
        if (!in_array($extension, $allowedExtensions)) {
            return [
                'success' => false,
                'path' => null,
                'error' => 'File type not allowed. Allowed types: ' . implode(', ', $allowedExtensions),
            ];
        }

        // Validate MIME type if category-specific validation exists
        if (isset($this->allowedMimeTypes[$category])) {
            $mimeType = $file->getMimeType();
            if (!in_array($mimeType, $this->allowedMimeTypes[$category])) {
                return [
                    'success' => false,
                    'path' => null,
                    'error' => 'Invalid file content type.',
                ];
            }
        }

        // Validate file size
        $maxSize = $this->maxSizes[$category] ?? $this->maxSizes['document'];
        if ($file->getSize() > $maxSize) {
            return [
                'success' => false,
                'path' => null,
                'error' => 'File size exceeds maximum allowed size of ' . ($maxSize / 1024 / 1024) . 'MB.',
            ];
        }

        // Sanitize and create filename
        $filename = $this->generateSecureFilename($file, $customName);

        // Ensure directory exists with proper permissions
        $fullDirectoryPath = public_path($directory);
        if (!$this->ensureDirectoryExists($fullDirectoryPath)) {
            return [
                'success' => false,
                'path' => null,
                'error' => 'Failed to create upload directory.',
            ];
        }

        // Move file to destination
        try {
            $file->move($fullDirectoryPath, $filename);
            
            // Set proper file permissions
            $fullFilePath = $fullDirectoryPath . DIRECTORY_SEPARATOR . $filename;
            if (file_exists($fullFilePath)) {
                chmod($fullFilePath, $this->filePermission);
            }

            return [
                'success' => true,
                'path' => $directory . '/' . $filename,
                'error' => null,
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'path' => null,
                'error' => 'Failed to upload file: ' . $e->getMessage(),
            ];
        }
    }

    /**
     * Upload profile picture with specific settings
     *
     * @param UploadedFile $file
     * @param int $userId
     * @return array
     */
    public function uploadProfilePicture(UploadedFile $file, int $userId): array
    {
        $directory = 'profile/pictures/' . $userId;
        return $this->upload($file, $directory, 'image', 'profile_' . time());
    }

    /**
     * Upload CV/Resume document
     *
     * @param UploadedFile $file
     * @param int $userId
     * @return array
     */
    public function uploadCV(UploadedFile $file, int $userId): array
    {
        $directory = 'profile/job_cvs';
        $customName = $this->sanitizeString((string) $userId) . '_cv_' . time();
        return $this->upload($file, $directory, 'document', $customName);
    }

    /**
     * Upload gallery image
     *
     * @param UploadedFile $file
     * @param int $userId
     * @return array
     */
    public function uploadGalleryImage(UploadedFile $file, int $userId): array
    {
        $directory = 'profile/gallery/' . $userId;
        return $this->upload($file, $directory, 'image', 'gallery_' . time());
    }

    /**
     * Generate a secure filename
     *
     * @param UploadedFile $file
     * @param string|null $customName
     * @return string
     */
    protected function generateSecureFilename(UploadedFile $file, ?string $customName = null): string
    {
        $extension = strtolower($file->getClientOriginalExtension());
        
        if ($customName) {
            $baseName = $this->sanitizeString($customName);
        } else {
            $baseName = time() . '_' . Str::random(8);
        }

        return $baseName . '.' . $extension;
    }

    /**
     * Sanitize a string for use in filenames
     *
     * @param string $string
     * @return string
     */
    protected function sanitizeString(string $string): string
    {
        // Replace special characters with underscores
        $sanitized = preg_replace('/[^A-Za-z0-9_\-]/', '_', $string);
        // Remove multiple consecutive underscores
        $sanitized = preg_replace('/_+/', '_', $sanitized);
        // Trim underscores from start and end
        return trim($sanitized, '_');
    }

    /**
     * Ensure directory exists with proper permissions
     *
     * @param string $path
     * @return bool
     */
    protected function ensureDirectoryExists(string $path): bool
    {
        if (!File::exists($path)) {
            return File::makeDirectory($path, $this->directoryPermission, true);
        }
        return true;
    }

    /**
     * Delete a file if it exists
     *
     * @param string $path Relative path from public directory
     * @return bool
     */
    public function delete(string $path): bool
    {
        $fullPath = public_path($path);
        if (File::exists($fullPath)) {
            return File::delete($fullPath);
        }
        return true;
    }
}
