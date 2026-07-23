<?php

namespace Database\Seeders;

use App\Models\Gallery;
use App\Models\TeamMember;
use App\Models\Faq;
use App\Models\JobOpening;
use App\Models\Post;
use App\Models\Project;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // ------------------------------------------------------------------
        // Admin user (change the password after first login!)
        // ------------------------------------------------------------------
        User::updateOrCreate(
            ['email' => 'admin@solfatechnologies.com'],
            ['name' => 'Solfa Admin', 'password' => Hash::make('password')]
        );

        // ------------------------------------------------------------------
        // Site settings
        // ------------------------------------------------------------------
        $settings = [
            'site_name' => 'Solfa Technologies',
            'tagline' => 'Smart IT Solutions for Digital Growth',
            'hero_title' => 'Reliable IT & Digital Solutions for Growing Businesses',
            'hero_text' => 'Solfa Technologies provides industry-specific technology and marketing strategies for businesses of all sizes. Our team offers complete support including web development, creative design, SEO, and performance marketing to help brands grow faster and smarter.',
            'phone' => '+880 1700 000000',
            'email' => 'hello@solfatechnologies.com',
            'address' => 'Dhaka, Bangladesh',
            'facebook' => 'https://facebook.com/solfatechnologies',
            'linkedin' => 'https://linkedin.com/company/solfatechnologies',
            'twitter' => 'https://x.com/solfatech',
            'stat_projects' => '250',
            'stat_clients' => '120',
            'stat_years' => '8',
            'stat_team' => '35',
            'about_title' => 'Solfa Technologies - Smart Solutions for Digital Growth',
            'about_text' => 'Solfa Technologies delivers reliable technology services, innovative software solutions, and expert support to help businesses scale, secure systems, and succeed in an evolving digital landscape.',
            'vision' => 'To become the most trusted technology partner for growing businesses, delivering solutions that create lasting digital impact.',
            'mission' => 'We combine creativity, engineering, and strategy to build digital products and campaigns that move businesses forward.',
        ];

        foreach ($settings as $key => $value) {
            Setting::set($key, $value);
        }

        // ------------------------------------------------------------------
        // Services
        // ------------------------------------------------------------------
        $services = [
            ['title' => 'Web Development', 'icon' => 'code', 'excerpt' => 'Custom websites and web applications built with modern frameworks, optimized for speed, security, and scale.'],
            ['title' => 'SEO Optimization', 'icon' => 'search', 'excerpt' => 'Technical SEO, on-page optimization, and content strategies that increase visibility and drive organic traffic.'],
            ['title' => 'Graphics Design', 'icon' => 'pen', 'excerpt' => 'Brand identities, marketing creatives, and UI design that make your business memorable and professional.'],
            ['title' => 'Digital Marketing', 'icon' => 'chart', 'excerpt' => 'Performance-driven campaigns across search and social that turn advertising budgets into measurable growth.'],
            ['title' => 'Social Media Strategy', 'icon' => 'share', 'excerpt' => 'Content calendars, community management, and paid social strategies that build engaged audiences.'],
            ['title' => 'Mobile App Development', 'icon' => 'mobile', 'excerpt' => 'Native and cross-platform mobile applications designed for performance and delightful user experience.'],
        ];

        foreach ($services as $i => $service) {
            Service::updateOrCreate(
                ['title' => $service['title']],
                $service + ['sort_order' => $i + 1, 'body' => $service['excerpt'].' Contact us to learn how this service can be tailored to your business goals.']
            );
        }

        // ------------------------------------------------------------------
        // Projects
        // ------------------------------------------------------------------
        $projects = [
            [
                'title' => 'E-commerce Platform for RetailPro',
                'category' => 'Web Development',
                'client' => 'RetailPro Ltd.',
                'website_url' => 'https://retailpro.example.com',
                'image' => 'images/about_workspace_main.png',
                'is_featured' => true
            ],
            [
                'title' => 'SEO Campaign for MediCare Clinic',
                'category' => 'SEO',
                'client' => 'MediCare Clinic',
                'website_url' => 'https://medicareclinic.example.com',
                'image' => 'images/about_team_overlay.png',
                'is_featured' => true
            ],
            [
                'title' => 'Brand Launch for UrbanWear',
                'category' => 'Digital Marketing',
                'client' => 'UrbanWear',
                'website_url' => 'https://urbanwear.example.com',
                'image' => 'images/about_workspace_main.png',
                'is_featured' => true
            ],
            [
                'title' => 'Corporate Website for BuildRight',
                'category' => 'Web Development',
                'client' => 'BuildRight Construction',
                'website_url' => 'https://buildright.example.com',
                'image' => 'images/about_team_overlay.png',
                'is_featured' => false
            ],
            [
                'title' => 'Local SEO for FreshMart Grocery',
                'category' => 'SEO',
                'client' => 'FreshMart',
                'website_url' => 'https://freshmart.example.com',
                'image' => 'images/about_workspace_main.png',
                'is_featured' => false
            ],
            [
                'title' => 'Social Ads for FitLife Gym',
                'category' => 'Digital Marketing',
                'client' => 'FitLife Gym',
                'website_url' => 'https://fitlifegym.example.com',
                'image' => 'images/about_team_overlay.png',
                'is_featured' => false
            ],
        ];

        foreach ($projects as $i => $project) {
            Project::updateOrCreate(
                ['title' => $project['title']],
                $project + [
                    'sort_order' => $i + 1,
                    'completed_at' => now()->subMonths($i + 1),
                    'description' => 'A results-focused engagement delivered by the Solfa Technologies team, combining strategy, design, and engineering to meet the client\'s growth goals.',
                ]
            );
        }

        // ------------------------------------------------------------------
        // Testimonials
        // ------------------------------------------------------------------
        $testimonials = [
            ['name' => 'Gilbert Chaves', 'position' => 'CEO', 'company' => 'RetailPro Ltd.', 'quote' => 'Solfa Technologies rebuilt our online store and our conversion rate doubled within three months. Professional, responsive, and genuinely invested in our success.'],
            ['name' => 'Alina Rahman', 'position' => 'Founder', 'company' => 'UrbanWear', 'quote' => 'From branding to launch campaigns, the Solfa team handled everything. We could not have asked for a smoother experience.'],
            ['name' => 'Sakib Hossain', 'position' => 'Director', 'company' => 'MediCare Clinic', 'quote' => 'Our clinic now ranks on the first page for every key search term in our city. The SEO work paid for itself many times over.'],
        ];

        foreach ($testimonials as $i => $t) {
            Testimonial::updateOrCreate(['name' => $t['name']], $t + ['sort_order' => $i + 1]);
        }

        // ------------------------------------------------------------------
        // FAQs
        // ------------------------------------------------------------------
        $faqs = [
            ['question' => 'What services does Solfa Technologies offer?', 'answer' => 'We offer web development, SEO optimization, graphics design, digital marketing, social media strategy, and mobile app development - a complete digital growth stack under one roof.'],
            ['question' => 'How long does a typical website project take?', 'answer' => 'A standard business website takes 3-6 weeks depending on scope. Larger platforms and custom applications are scoped individually with a clear timeline before we start.'],
            ['question' => 'Do you work with startups and small businesses?', 'answer' => 'Absolutely. We build industry-specific strategies for businesses of all sizes, with flexible packages designed to fit startup budgets.'],
            ['question' => 'How do you measure the success of a campaign?', 'answer' => 'Every engagement starts with agreed KPIs - traffic, rankings, leads, or revenue. You receive transparent monthly reports showing exactly what was done and what it achieved.'],
            ['question' => 'Do you provide support after the project launches?', 'answer' => 'Yes. All projects include a support period, and we offer ongoing maintenance and growth retainers so your product keeps improving after launch.'],
            ['question' => 'Can you migrate our website to a new system?', 'answer' => 'Yes, we handle seamless migration of content, databases, and SEO rankings from any legacy platform to modern stacks without downtime.'],
            ['question' => 'Who owns the final intellectual property of the product?', 'answer' => 'You do. Once the final invoice is paid, complete ownership of the source code, design assets, and content is transferred fully to your business.'],
            ['question' => 'What is your payment structure for new projects?', 'answer' => 'We typically work on a milestone-based structure: 30% kickoff, 40% design approval milestone, and 30% post-launch and handover.'],
        ];

        foreach ($faqs as $i => $faq) {
            Faq::updateOrCreate(['question' => $faq['question']], $faq + ['sort_order' => $i + 1]);
        }

        // ------------------------------------------------------------------
        // Blog posts
        // ------------------------------------------------------------------
        $posts = [
            ['title' => '5 Signs Your Business Website Needs a Redesign', 'excerpt' => 'Slow load times, outdated design, and poor mobile experience quietly cost you customers. Here is how to know when it is time to rebuild.'],
            ['title' => 'How Local SEO Helps Small Businesses Win Big', 'excerpt' => 'Local search is where buying decisions happen. Learn the fundamentals of ranking in your city and turning searches into store visits.'],
            ['title' => 'Choosing the Right Digital Marketing Channel in 2026', 'excerpt' => 'Search, social, email, or video? A practical framework for deciding where your marketing budget will work hardest.'],
        ];

        foreach ($posts as $i => $post) {
            Post::updateOrCreate(
                ['title' => $post['title']],
                $post + [
                    'author' => 'Solfa Team',
                    'published_at' => now()->subDays(($i + 1) * 7),
                    'body' => $post['excerpt']."\n\nAt Solfa Technologies we help businesses make these decisions every day. This article walks through the key considerations, common mistakes, and a simple checklist you can apply to your own business right away.\n\nIf you would like a free consultation on this topic, get in touch with our team - we are always happy to help.",
                ]
            );
        }

        // ------------------------------------------------------------------
        // Job openings
        // ------------------------------------------------------------------
        $jobs = [
            ['title' => 'Digital Marketing Intern', 'location' => 'Dhaka', 'type' => 'Full Time', 'workplace_type' => 'In office', 'vacancies' => 3, 'salary' => 'Negotiable', 'summary' => 'Assist in managing social media campaigns, content scheduling, and digital analytics.'],
            ['title' => 'Senior Content Writer', 'location' => 'Dhaka', 'type' => 'Full Time', 'workplace_type' => 'In office', 'vacancies' => 1, 'salary' => 'Negotiable', 'summary' => 'Craft compelling articles, website copy, and marketing campaign materials for client projects.'],
            ['title' => 'Senior Creative Designer', 'location' => 'Dhaka', 'type' => 'Full Time', 'workplace_type' => 'In office', 'vacancies' => 1, 'salary' => 'Negotiable', 'summary' => 'Design brand identities, UI components, and social media creative assets.'],
            ['title' => 'Video Editor', 'location' => 'Dhaka', 'type' => 'Full Time', 'workplace_type' => 'In office', 'vacancies' => 1, 'salary' => 'Negotiable', 'summary' => 'Create engaging video reels, promotional ads, and motion graphics.'],
            ['title' => 'Senior Laravel Developer', 'location' => 'Dhaka', 'type' => 'Full Time', 'workplace_type' => 'Hybrid', 'vacancies' => 2, 'salary' => 'Negotiable', 'summary' => 'Build and maintain scalable web applications using Laravel, MySQL, and modern APIs.'],
        ];

        foreach ($jobs as $job) {
            JobOpening::updateOrCreate(
                ['title' => $job['title']],
                $job + [
                    'deadline' => now()->addDays(20),
                    'description' => $job['summary']."\n\nRequirements:\n- Relevant skills or degree in the field\n- Strong communication and teamwork abilities\n- Portfolio or work samples preferred\n\nTo apply, send your CV to careers@solfatechnologies.com with the job title in the subject line.",
                ]
            );
        }

        // ------------------------------------------------------------------
        // Gallery
        // ------------------------------------------------------------------
        $galleries = [
            ['image' => 'images/gallery_workspace_1.png', 'title' => 'Workspace & Team Collaboration', 'sort_order' => 1],
            ['image' => 'images/gallery_workspace_2.png', 'title' => 'Conference Brainstorming Session', 'sort_order' => 2],
            ['image' => 'images/gallery_workspace_3.png', 'title' => 'Developer Programming Desk', 'sort_order' => 3],
            ['image' => 'images/gallery_workspace_4.png', 'title' => 'Agency Office Lounge Area', 'sort_order' => 4],
        ];

        foreach ($galleries as $g) {
            Gallery::updateOrCreate(['image' => $g['image']], $g);
        }

        // ------------------------------------------------------------------
        // Team Members
        // ------------------------------------------------------------------
        $team = [
            ['name' => 'MANNISA', 'designation' => 'SR. SOCIAL MEDIA MANAGER', 'image' => 'images/gallery_workspace_1.png', 'sort_order' => 1],
            ['name' => 'RAHAD', 'designation' => 'SOCIAL MEDIA MANAGER', 'image' => 'images/gallery_workspace_2.png', 'sort_order' => 2],
            ['name' => 'KAWSAR', 'designation' => 'WEB DESIGNER (WORDPRESS)', 'image' => 'images/gallery_workspace_3.png', 'sort_order' => 3],
        ];

        foreach ($team as $member) {
            TeamMember::updateOrCreate(['name' => $member['name']], $member);
        }
    }
}
