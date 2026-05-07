<?php

namespace App\Support;

class SiteData
{
    public static function company(): array
    {
        return [
            'name'    => 'Click Software GH',
            'tagline' => 'High Level Multi-technology solution for best living',
            'email'   => 'info@clicksoftwaregh.com',
            'phones'  => ['+233 0249966680', '+233 0267077811'],
            'whatsapp' => '233249966680',
            'address' => 'PLT2 BLK3, Abrepo Bronikrom, Kumasi, Ghana',
            'city'    => 'Kumasi, Ashanti, Ghana',
            'social'  => [
                'facebook'  => '#',
                'twitter'   => '#',
                'linkedin'  => '#',
                'instagram' => '#',
            ],
        ];
    }

    public static function services(): array
    {
        return [
            [
                'slug' => 'website-design-development',
                'title' => 'Website Design and Development',
                'icon' => 'fa-solid fa-globe',
                'short' => 'Modern, fast, SEO-friendly websites that convert visitors into customers.',
                'benefits' => ['Responsive across devices', 'SEO optimized structure', 'Fast loading speed', 'Easy content updates'],
            ],
            [
                'slug' => 'mobile-app-development',
                'title' => 'Mobile App Development',
                'icon' => 'fa-solid fa-mobile-screen',
                'short' => 'Native and cross-platform Android & iOS apps tailored to your business.',
                'benefits' => ['Android & iOS support', 'Smooth user experience', 'Push notifications', 'Offline support'],
            ],
            [
                'slug' => 'custom-software-development',
                'title' => 'Custom Software Development',
                'icon' => 'fa-solid fa-code',
                'short' => 'Tailor-made software systems built around your unique business processes.',
                'benefits' => ['Built for your workflow', 'Scalable architecture', 'Secure by design', 'Long-term support'],
            ],
            [
                'slug' => 'school-management-systems',
                'title' => 'School Management Systems',
                'icon' => 'fa-solid fa-graduation-cap',
                'short' => 'Complete digital systems to manage students, staff, fees, results and more.',
                'benefits' => ['Student & staff records', 'Fees & billing', 'Results & report cards', 'Parent portal'],
            ],
            [
                'slug' => 'hospital-clinic-management-systems',
                'title' => 'Hospital / Clinic Management Systems',
                'icon' => 'fa-solid fa-hospital',
                'short' => 'Digitize patient records, appointments, billing, pharmacy, and lab operations.',
                'benefits' => ['Electronic health records', 'Appointments & queues', 'Pharmacy & billing', 'Lab management'],
            ],
            [
                'slug' => 'business-management-systems',
                'title' => 'Business Management Systems',
                'icon' => 'fa-solid fa-briefcase',
                'short' => 'POS, inventory, HR, accounting and CRM systems that grow with your business.',
                'benefits' => ['Inventory & POS', 'HR & payroll', 'Accounting & reports', 'Multi-branch support'],
            ],
            [
                'slug' => 'ecommerce-solutions',
                'title' => 'E-commerce Solutions',
                'icon' => 'fa-solid fa-cart-shopping',
                'short' => 'Sell online with secure stores integrated with mobile money and card payments.',
                'benefits' => ['Mobile money & card payments', 'Inventory sync', 'Order tracking', 'Marketing tools'],
            ],
            [
                'slug' => 'domain-hosting-email-setup',
                'title' => 'Domain, Hosting and Email Setup',
                'icon' => 'fa-solid fa-server',
                'short' => 'Reliable domain registration, web hosting and professional email solutions.',
                'benefits' => ['Domain registration', 'Fast SSD hosting', 'Branded email', 'SSL & backups'],
            ],
            [
                'slug' => 'it-consultancy',
                'title' => 'IT Consultancy',
                'icon' => 'fa-solid fa-people-arrows',
                'short' => 'Expert advice on technology strategy, vendor selection and digital roadmaps.',
                'benefits' => ['Technology audit', 'Vendor selection', 'Digital roadmap', 'Cost optimization'],
            ],
            [
                'slug' => 'system-maintenance-support',
                'title' => 'System Maintenance and Support',
                'icon' => 'fa-solid fa-screwdriver-wrench',
                'short' => 'Proactive maintenance, monitoring and support for your business systems.',
                'benefits' => ['24/7 monitoring', 'Quick response', 'Security updates', 'Performance tuning'],
            ],
            [
                'slug' => 'digital-transformation-consulting',
                'title' => 'Digital Transformation Consulting',
                'icon' => 'fa-solid fa-rocket',
                'short' => 'Move your operations from paper to powerful, integrated digital platforms.',
                'benefits' => ['Process automation', 'Cloud migration', 'Staff training', 'Change management'],
            ],
            [
                'slug' => 'ui-ux-design',
                'title' => 'UI/UX Design',
                'icon' => 'fa-solid fa-pen-ruler',
                'short' => 'Beautiful, intuitive interfaces designed around real user behavior.',
                'benefits' => ['User research', 'Wireframes & prototypes', 'Modern visual design', 'Usability testing'],
            ],
        ];
    }

    public static function projects(): array
    {
        return [
            [
                'slug' => 'school-management-platform',
                'title' => 'School Management Platform',
                'category' => 'Education',
                'image' => 'https://images.unsplash.com/photo-1503676260728-1c00da094a0b?auto=format&fit=crop&w=1200&q=70',
                'short' => 'A complete platform for managing students, staff, fees and results for K-12 schools.',
                'tech' => ['Laravel', 'MySQL', 'Tailwind CSS', 'Alpine.js'],
                'problem' => 'Schools were managing students, fees and results manually with spreadsheets, leading to errors and slow reporting.',
                'solution' => 'We built a unified web platform that digitizes admissions, fees, attendance, exams and parent communication.',
                'features' => ['Student & staff profiles', 'Fees billing & receipts', 'Exam scoring & report cards', 'Parent SMS/email notifications', 'Role-based dashboards'],
                'result' => 'Reduced administrative workload by 60% and improved fee collection rate by 35%.',
            ],
            [
                'slug' => 'hospital-management-system',
                'title' => 'Hospital Management System',
                'category' => 'Healthcare',
                'image' => 'https://images.unsplash.com/photo-1576091160550-2173dba999ef?auto=format&fit=crop&w=1200&q=70',
                'short' => 'EHR, appointments, pharmacy and billing for a multi-department hospital.',
                'tech' => ['Laravel', 'Vue.js', 'MySQL', 'Redis'],
                'problem' => 'Patient records were paper-based, causing long queues, missing files and slow billing.',
                'solution' => 'We delivered an integrated hospital system covering OPD, lab, pharmacy, billing and electronic health records.',
                'features' => ['Electronic health records', 'Appointment scheduling', 'Pharmacy & inventory', 'Insurance & cash billing', 'Lab results module'],
                'result' => 'Average patient wait time dropped from 90 to 30 minutes.',
            ],
            [
                'slug' => 'business-accounting-system',
                'title' => 'Business Accounting System',
                'category' => 'Business',
                'image' => 'https://images.unsplash.com/photo-1554224155-6726b3ff858f?auto=format&fit=crop&w=1200&q=70',
                'short' => 'Cloud accounting platform for SMEs with invoicing, expenses and reporting.',
                'tech' => ['Laravel', 'Livewire', 'PostgreSQL'],
                'problem' => 'SMEs lacked affordable accounting software tailored to Ghanaian tax and reporting needs.',
                'solution' => 'A cloud-based accounting suite with invoicing, expenses, VAT, payroll and financial reports.',
                'features' => ['Invoicing & receipts', 'Expense tracking', 'VAT & tax reports', 'Bank reconciliation', 'Profit & loss reports'],
                'result' => 'Helped 50+ SMEs file accurate tax returns on time.',
            ],
            [
                'slug' => 'ecommerce-website',
                'title' => 'E-commerce Website',
                'category' => 'Retail',
                'image' => 'https://images.unsplash.com/photo-1556742044-3c52d6e88c62?auto=format&fit=crop&w=1200&q=70',
                'short' => 'A full online store with mobile money checkout for a local fashion brand.',
                'tech' => ['Laravel', 'Tailwind CSS', 'Paystack', 'MySQL'],
                'problem' => 'A growing fashion brand needed to sell online and accept mobile money payments securely.',
                'solution' => 'A modern e-commerce site with product catalog, mobile money & card checkout, and order tracking.',
                'features' => ['Product catalog & search', 'Cart & secure checkout', 'Mobile money & card payments', 'Order tracking', 'Admin dashboard'],
                'result' => 'Online sales now contribute 40% of total monthly revenue.',
            ],
            [
                'slug' => 'company-profile-website',
                'title' => 'Company Profile Website',
                'category' => 'Corporate',
                'image' => 'https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&w=1200&q=70',
                'short' => 'Modern corporate website for a consulting firm with CMS and blog.',
                'tech' => ['Laravel', 'Blade', 'Tailwind CSS'],
                'problem' => 'A consulting firm needed a credible online presence to attract enterprise clients.',
                'solution' => 'A professional, fast-loading corporate website with services, projects and blog modules.',
                'features' => ['Services showcase', 'Project portfolio', 'Blog & insights', 'Contact & quote forms', 'SEO optimized'],
                'result' => 'Generated 3x more qualified leads within the first quarter.',
            ],
            [
                'slug' => 'mobile-app-dashboard',
                'title' => 'Mobile App Dashboard',
                'category' => 'Mobile',
                'image' => 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&w=1200&q=70',
                'short' => 'Admin dashboard powering a fintech mobile app for agents.',
                'tech' => ['Laravel API', 'Flutter', 'MySQL', 'Redis'],
                'problem' => 'A fintech needed an admin dashboard to monitor transactions and manage agents in real-time.',
                'solution' => 'A real-time admin dashboard backed by a Laravel API serving the Flutter mobile app.',
                'features' => ['Real-time transaction feed', 'Agent management', 'Commission reports', 'KYC verification', 'Audit logs'],
                'result' => 'Operations team monitors 10,000+ daily transactions with ease.',
            ],
        ];
    }

    public static function blogs(): array
    {
        return [
            [
                'slug' => 'why-every-business-needs-a-website',
                'title' => 'Why Every Business Needs a Website in 2026',
                'category' => 'Business',
                'date' => 'March 12, 2026',
                'author' => 'Click Software GH Team',
                'image' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&w=1200&q=70',
                'excerpt' => 'A website is no longer optional. It is the most powerful 24/7 sales tool a business can own.',
                'body' => "In today's digital-first economy, customers search online before they buy. A professional website builds trust, showcases your services and is open 24 hours a day. Whether you run a salon in Kumasi or a logistics company in Accra, your website is the front door of your business.\n\nA well-built website helps you compete, capture leads, and serve customers even when your office is closed. It also gives you a permanent address on the internet that you fully control — unlike social media pages that can be restricted overnight.",
            ],
            [
                'slug' => 'benefits-of-custom-software-for-smes',
                'title' => 'Benefits of Custom Software for SMEs',
                'category' => 'Software',
                'date' => 'March 4, 2026',
                'author' => 'Click Software GH Team',
                'image' => 'https://images.unsplash.com/photo-1531403009284-440f080d1e12?auto=format&fit=crop&w=1200&q=70',
                'excerpt' => 'Off-the-shelf tools rarely fit perfectly. Custom software is built for the way YOUR business works.',
                'body' => "Small and medium businesses often outgrow generic tools. Custom software adapts to your processes, eliminates manual steps and integrates with your existing tools.\n\nThe right custom system pays for itself by saving staff time, reducing errors and giving leadership the reports they need to make better decisions.",
            ],
            [
                'slug' => 'how-school-management-systems-improve-administration',
                'title' => 'How School Management Systems Improve Administration',
                'category' => 'Education',
                'date' => 'February 22, 2026',
                'author' => 'Click Software GH Team',
                'image' => 'https://images.unsplash.com/photo-1513258496099-48168024aec0?auto=format&fit=crop&w=1200&q=70',
                'excerpt' => 'Modern schools rely on digital systems to manage students, fees, results and parent communication.',
                'body' => "School Management Systems unify everything from admissions to graduation. Teachers spend less time on paperwork, parents stay informed, and school owners get clear reports on performance and finances.\n\nIn Ghana, schools that have adopted digital systems are seeing faster fee collection, fewer record-keeping mistakes and stronger parent engagement.",
            ],
            [
                'slug' => 'why-hospitals-need-digital-record-systems',
                'title' => 'Why Hospitals Need Digital Record Systems',
                'category' => 'Healthcare',
                'date' => 'February 10, 2026',
                'author' => 'Click Software GH Team',
                'image' => 'https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?auto=format&fit=crop&w=1200&q=70',
                'excerpt' => 'Paper records slow down care. Digital health records keep patients safer and staff faster.',
                'body' => "Electronic Health Records (EHR) make patient information instantly available to doctors, reduce duplicate tests, and improve safety by tracking allergies and prescriptions.\n\nA modern hospital system also speeds up billing, manages pharmacy stock, and gives leadership the data they need to plan capacity and staffing.",
            ],
            [
                'slug' => 'choosing-between-a-website-and-a-mobile-app',
                'title' => 'Choosing Between a Website and a Mobile App',
                'category' => 'Strategy',
                'date' => 'January 28, 2026',
                'author' => 'Click Software GH Team',
                'image' => 'https://images.unsplash.com/photo-1512941937669-90a1b58e7e9c?auto=format&fit=crop&w=1200&q=70',
                'excerpt' => 'Not sure whether you need a website, a mobile app, or both? Here is a simple framework.',
                'body' => "Websites are best for reaching new customers, sharing information and being discoverable on Google. Mobile apps shine when you have repeat users who need fast, app-like experiences with offline support and notifications.\n\nMany growing businesses end up needing both — a marketing website for visibility and a focused mobile app for engaged customers.",
            ],
        ];
    }

    public static function testimonials(): array
    {
        return [
            [
                'name' => 'Kwame Mensah',
                'role' => 'Headmaster, Ridge International School',
                'avatar' => 'https://i.pravatar.cc/150?img=12',
                'quote' => 'Click Software GH transformed how we run our school. Fees, results and parent updates all in one place.',
            ],
            [
                'name' => 'Akosua Boateng',
                'role' => 'CEO, Akosua Fashion House',
                'avatar' => 'https://i.pravatar.cc/150?img=47',
                'quote' => 'Our online store doubled our monthly sales. The team was professional from start to finish.',
            ],
            [
                'name' => 'Dr. Yaw Owusu',
                'role' => 'Medical Director, City Clinic',
                'avatar' => 'https://i.pravatar.cc/150?img=33',
                'quote' => 'The hospital system reduced patient wait times drastically. Highly recommended.',
            ],
            [
                'name' => 'Ama Sarpong',
                'role' => 'Operations Manager, GreenLogix',
                'avatar' => 'https://i.pravatar.cc/150?img=5',
                'quote' => 'Reliable, fast, and detail-oriented. They understood our business and delivered above expectation.',
            ],
        ];
    }

    public static function team(): array
    {
        return [
            ['name' => 'Emmanuel Asare', 'role' => 'Founder & CEO', 'avatar' => 'https://i.pravatar.cc/300?img=68'],
            ['name' => 'Linda Owusu', 'role' => 'Lead Software Engineer', 'avatar' => 'https://i.pravatar.cc/300?img=45'],
            ['name' => 'Kojo Asante', 'role' => 'Mobile Developer', 'avatar' => 'https://i.pravatar.cc/300?img=15'],
            ['name' => 'Abena Darko', 'role' => 'UI/UX Designer', 'avatar' => 'https://i.pravatar.cc/300?img=49'],
        ];
    }

    public static function timeline(): array
    {
        return [
            ['year' => '2018', 'title' => 'Founded in Kumasi', 'text' => 'Click Software GH was established to bring world-class software to local businesses.'],
            ['year' => '2020', 'title' => 'First Major Platform', 'text' => 'Launched our flagship School Management Platform serving multiple schools.'],
            ['year' => '2022', 'title' => 'Healthcare Expansion', 'text' => 'Delivered Hospital Management Systems to clinics across the Ashanti region.'],
            ['year' => '2024', 'title' => 'Regional Reach', 'text' => 'Started serving clients across West Africa with cloud-based business systems.'],
            ['year' => '2026', 'title' => 'Today', 'text' => 'A trusted multi-technology partner for businesses, schools and hospitals.'],
        ];
    }

    public static function values(): array
    {
        return [
            ['icon' => 'fa-solid fa-lightbulb', 'title' => 'Innovation', 'text' => 'We embrace new ideas and technologies to keep our clients ahead.'],
            ['icon' => 'fa-solid fa-shield-halved', 'title' => 'Reliability', 'text' => 'We build systems and relationships you can depend on, every day.'],
            ['icon' => 'fa-solid fa-user-tie', 'title' => 'Professionalism', 'text' => 'We bring discipline, structure and integrity to every project.'],
            ['icon' => 'fa-solid fa-handshake', 'title' => 'Client Satisfaction', 'text' => 'Your success is the true measure of our work.'],
            ['icon' => 'fa-solid fa-lock', 'title' => 'Security', 'text' => 'We take data protection and system security seriously.'],
            ['icon' => 'fa-solid fa-arrows-spin', 'title' => 'Continuous Improvement', 'text' => 'We learn, refine and improve constantly.'],
        ];
    }

    public static function findProject(string $slug): ?array
    {
        foreach (self::projects() as $p) {
            if ($p['slug'] === $slug) return $p;
        }
        return null;
    }

    public static function findBlog(string $slug): ?array
    {
        foreach (self::blogs() as $b) {
            if ($b['slug'] === $slug) return $b;
        }
        return null;
    }
}
