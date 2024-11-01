<?php

namespace Database\Seeders;

use App\Models\BusinessCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BusinessCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'Multi-lingual Interpretation & Support',
            'Newsletter Template Creation',
            'Office Management',
            'Online Business Management',
            'Online Reputation Management',
            'Optimize Existing Content',
            'Optimize Social Media Profiles',
            'Order Fulfillment',
            'Order Management',
            'Ordering Supplies',
            'Payroll Services',
            'Personal Assistant Services',
            'Personal Shopping',
            'Pinterest',
            'Podcast Editing',
            'Podcast Marketing',
            'Podcast Research',
            'Podcast Scripting',
            'Podcast Setup',
            'Podcasting',
            'Prepare Taxes',
            'Presentation Creation (PPT, Canva, etc.)',
            'Press Release Distribution',
            'Product Creation & Development',
            'Product Launch Support',
            'Project Management',
            'Proofreading / Editing / Formatting',
            'Realtor listing management',
            'Receptionist',
            'Relationship Management',
            'Research',
            'Research Partners for Influencers',
            'Sale Page Creation',
            'Sales Funnel Setup',
            'Sales Funnels',
            'Sales Page Creation',
            'Sales Outreach',
            'Sales Tax Filing',
            'Schedule Events',
            'Schedule Meetings',
            'Search Engine Marketing (SEM)',
            'Search Engine Optimization (SEO)',
            'Securing Podcast Sponsorships',
            'Self-published Books',
            'Shopping Cart Management',
            'Shopping Cart Setup',
            'Social Media Account Setup',
            'Social Media Group Management',
            'Social Media Management & Marketing',
            'Social Media Scheduling',
            'Social Media Tool Setup and Training',
            'Source Stock Photos',
            'Split Testing',
            'Spreadsheets Creation',
            'Standard Operation Procedures (SOPs)',
            'Streamline and Automate Systems',
            'Story Creation (Instagram, Facebook)',
            'Taking Meeting Minutes',
            'Transcription',
            'Translation',
            'Travel & Concierge Services',
            'Video Editor',
            'Video Marketing',
            'Video Production',
            'Voiceovers',
            'Web Design',
            'Web Development',
            'Webinar Creation',
            'Webinar Funnel Set Up',
            'Webinar Moderating',
            'Website Maintenance',
            'Website Security',
            'Wix, Squarespace, etc.',
            'WordPress',
            'Writing / editing',
            'Writing Ads',
            'Writing Blog Posts',
            'Writing eBooks, Reports etc.',
            'Writing Newsletters',
            'Writing Product Descriptions (Etsy, Shopify, eBay, etc.)',
            'Writing Press Releases',
            'Writing Sales Funnels',
            'Writing Social Media Posts',
            'Writing Video or Podcast Scripts',
            'Mentoring for personal or professional development',
            'Virtual book club management',
            'Virtual writing workshops',
            'Virtual art classes',
            'Virtual music lessons',
            'Virtual cooking classes',
            'Virtual dance lessons',
            'Virtual photography lessons',
            'Virtual personal shopper for online fashion',
            'Virtual personal stylist advice',
            'Virtual beauty consultations',
            'Virtual hairstyling tips',
            'Virtual skincare consultations',
            'Virtual makeup tutorials',
            'Online tutoring in various subjects',
            'Virtual language lessons',
            'Virtual life coaching',
        ];

        foreach ($categories as $category) {
            BusinessCategory::create([
                'title' => $category,
                'url' => Str::slug($category), // Create slug from the title
            ]);
        }
    }
}
