<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'full_name' => 'John Doe',
                'gender' => 'Male',
                'email' => 'john.doe@example.com',
                'identity' => 'john.doe.123',
                'availability' => 'ACTIVELY SEARCHING',
                'password' => Hash::make('password123'),
                'phone' => '1234567890',
                'date_of_birth' => '1990-01-01',
                'street_address' => '123 Main St',
                'city' => 'Anytown',
                'state' => 'Anystate',
                'profile_image' => 'path/to/profile_image.jpg',
                'Location_address' => '123 Main St, Anytown, Anystate',
                'delivery_address' => '123 Main St, Anytown, Anystate',
                'role' => 'User',
                'business_category' => 'Category',
                'facebook' => 'https://facebook.com/johndoe',
                'instagram' => 'https://instagram.com/johndoe',
                'work_experience' => '5 years',
                'website_address' => 'https://johndoe.com',
                'service_description' => 'Service description goes here.',
                'agreement_status' => 'Agreed',
                'compensation_type' => 'Hourly',
                'job_preference' => 'Remote',
                'min_amount' => '500',
                'max_amount' => '1000',
                'is_admin' => '1',
                'status' => '1',
                'verify_code' => 'ABC123',
                'is_verified' => '1',
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more users here
        ]);
    }
}
