Build a complete admin dashboard for the Click Software GH website.

The public website is already done. Now create a secure admin panel to manage the website content.

Technology context:
- This is a Laravel project
- Use Blade, Laravel routes, controllers, middleware, migrations, models, and seeders
- Use Tailwind CSS for styling
- Use Alpine.js or simple JavaScript where needed
- The admin dashboard must support both Dark Mode and Light Mode
- The system must support multilingual content: English and French
- Default language: English
- Available languages: en, fr

Main goal:
Create a professional admin dashboard where site admins can manage:
- Website pages
- Services
- Projects / Portfolio
- Blog posts
- Testimonials
- Team members
- FAQs
- Contact messages
- Quote requests
- Website settings
- SEO metadata
- Language translations
- Media uploads

Admin authentication:
- Create secure admin login
- Use Laravel authentication or a custom admin guard
- Only authenticated admins can access /admin
- Add middleware: admin
- Add logout
- Add password reset placeholder if needed

Admin dashboard layout:
Create a modern responsive admin layout with:
- Sidebar navigation
- Top navbar
- User profile dropdown
- Dark / Light mode toggle
- Language switcher: EN / FR
- Dashboard cards
- Tables
- Forms
- Modals where useful
- Confirmation dialogs for delete actions
- Success and error alerts
- Mobile responsive sidebar

Admin route prefix:
All admin routes should use:

/admin

Example routes:
- /admin/dashboard
- /admin/pages
- /admin/services
- /admin/projects
- /admin/blog
- /admin/testimonials
- /admin/team
- /admin/faqs
- /admin/messages
- /admin/quotes
- /admin/media
- /admin/settings
- /admin/translations

Dashboard home:
Create dashboard overview cards showing:
- Total services
- Total projects
- Total blog posts
- Total contact messages
- Total quote requests
- Unread messages
- Published posts
- Draft posts

Also add:
- Recent contact messages
- Recent quote requests
- Recent blog posts
- Quick action buttons:
  Add Service
  Add Project
  Add Blog Post
  View Messages
  Edit Settings

Dark and light mode:
- Add a theme toggle button
- Save selected theme in localStorage
- Support system preference if no saved theme exists
- Dark mode should apply to dashboard background, sidebar, cards, tables, forms, inputs, dropdowns, modals, and buttons
- Light mode should be clean and professional
- Use Tailwind dark mode classes
- Make sure text remains readable in both modes

Multilingual support:
The admin dashboard must allow content in English and French.

For content models, use translation fields like:
- title_en
- title_fr
- description_en
- description_fr
- content_en
- content_fr
- meta_title_en
- meta_title_fr
- meta_description_en
- meta_description_fr

Add language tabs in forms:
- English tab
- French tab

When creating or editing content, admin should be able to fill both English and French versions.

For the public website:
- Add language switcher EN / FR
- Store selected language in session
- Use route prefix or session-based locale
- Public pages should display content based on selected language
- If French content is missing, fallback to English
- Add Laravel localization files:
  resources/lang/en/messages.php
  resources/lang/fr/messages.php

Admin sidebar menu:
- Dashboard
- Pages
- Services
- Projects
- Blog
- Testimonials
- Team
- FAQs
- Messages
- Quote Requests
- Media Library
- Settings
- Translations
- Logout

Models and database tables:

1. admins
Fields:
- id
- name
- email
- password
- role
- status
- timestamps

2. pages
Fields:
- id
- slug
- title_en
- title_fr
- content_en
- content_fr
- meta_title_en
- meta_title_fr
- meta_description_en
- meta_description_fr
- status: published/draft
- timestamps

3. services
Fields:
- id
- icon
- slug
- title_en
- title_fr
- short_description_en
- short_description_fr
- description_en
- description_fr
- benefits_en nullable text/json
- benefits_fr nullable text/json
- image
- sort_order
- is_featured boolean
- status published/draft
- meta_title_en
- meta_title_fr
- meta_description_en
- meta_description_fr
- timestamps

4. projects
Fields:
- id
- slug
- title_en
- title_fr
- category_en
- category_fr
- client_name nullable
- short_description_en
- short_description_fr
- description_en
- description_fr
- problem_en
- problem_fr
- solution_en
- solution_fr
- features_en nullable text/json
- features_fr nullable text/json
- technologies nullable text/json
- image
- gallery nullable json
- project_url nullable
- completion_date nullable
- is_featured boolean
- status published/draft
- meta_title_en
- meta_title_fr
- meta_description_en
- meta_description_fr
- timestamps

5. blog_posts
Fields:
- id
- slug
- title_en
- title_fr
- excerpt_en
- excerpt_fr
- content_en
- content_fr
- category_en
- category_fr
- image
- author_name
- published_at nullable
- status published/draft
- meta_title_en
- meta_title_fr
- meta_description_en
- meta_description_fr
- timestamps

6. testimonials
Fields:
- id
- client_name
- company_name nullable
- position nullable
- message_en
- message_fr
- rating
- image nullable
- status active/inactive
- sort_order
- timestamps

7. team_members
Fields:
- id
- name
- position_en
- position_fr
- bio_en
- bio_fr
- image
- email nullable
- linkedin nullable
- twitter nullable
- sort_order
- status active/inactive
- timestamps

8. faqs
Fields:
- id
- question_en
- question_fr
- answer_en
- answer_fr
- sort_order
- status active/inactive
- timestamps

9. contact_messages
Fields:
- id
- full_name
- email
- phone nullable
- organization nullable
- service nullable
- message
- status unread/read/replied
- timestamps

10. quote_requests
Fields:
- id
- full_name
- email
- phone
- organization nullable
- project_type
- budget_range nullable
- deadline nullable
- project_description
- attachment nullable
- status new/reviewed/approved/rejected
- timestamps

11. media
Fields:
- id
- file_name
- file_path
- file_type
- file_size
- alt_text_en nullable
- alt_text_fr nullable
- uploaded_by nullable
- timestamps

12. site_settings
Fields:
- id
- key
- value_en nullable
- value_fr nullable
- type
- group
- timestamps

Admin CRUD requirements:
For each content section:
- List records in a table
- Search records
- Filter by status
- Create new record
- Edit existing record
- Delete record
- Publish / unpublish where applicable
- Show created date and updated date
- Use pagination
- Validate all forms
- Generate slug automatically from English title
- Allow manual slug editing
- Show preview link where useful

Services admin:
- Add service
- Edit service
- Upload service image
- Choose icon
- Mark as featured
- Set sort order
- Add benefits in English and French

Projects admin:
- Add project
- Upload main image
- Upload gallery images
- Add technologies
- Add features in English and French
- Mark project as featured
- Add project URL
- Set status draft/published

Blog admin:
- Add post
- Edit post
- Upload featured image
- Add category
- Add author name
- Set published date
- Save as draft or publish
- Add SEO metadata

Messages admin:
- List contact messages
- View message details
- Mark as read
- Mark as replied
- Delete message
- Add status badges

Quote requests admin:
- List quote requests
- View full request
- Download attachment if available
- Change status
- Delete request
- Add status badges

Settings admin:
Allow admin to manage:
- Site name
- Site slogan
- Company email
- Company phone
- WhatsApp number
- Address
- Business hours
- Facebook link
- LinkedIn link
- Twitter/X link
- Instagram link
- Footer text
- Homepage hero title EN/FR
- Homepage hero subtitle EN/FR
- SEO default title EN/FR
- SEO default description EN/FR

Media library:
- Upload images and files
- List uploaded files
- Preview images
- Copy file URL
- Delete media
- Add alt text in English and French

Frontend integration:
Update the public website to pull content from the database instead of hardcoded content:
- Services page should load from services table
- Projects page should load from projects table
- Blog page should load from blog_posts table
- Testimonials should load from testimonials table
- Team section should load from team_members table
- FAQs should load from faqs table
- Homepage should load featured services, featured projects, testimonials, and settings
- Contact form should save to contact_messages table
- Quote form should save to quote_requests table

Language behavior:
- Public route should detect current locale
- Add language switcher on public navbar
- Use helper function to display translated fields
Example:
getTranslated($model, 'title')
should return title_fr when locale is fr, otherwise title_en
If selected translation is empty, fallback to English

Create a helper:
function translated($model, $field) {
    $locale = app()->getLocale();
    $value = $model->{$field . '_' . $locale} ?? null;
    return $value ?: $model->{$field . '_en'} ?? '';
}

Security:
- Protect admin routes with authentication middleware
- Validate file uploads
- Only allow image/pdf/doc/docx where needed
- Limit file upload size
- Use CSRF protection
- Use Laravel validation
- Escape frontend output properly
- Use policies or simple role checks where useful

UI design:
Use a premium SaaS admin dashboard style:
- Dark navy sidebar
- Clean cards
- Smooth hover effects
- Rounded corners
- Modern tables
- Good spacing
- Clear typography
- Status badges
- Icons in navigation
- Responsive mobile layout
- Dark mode and light mode polished properly

Seeder:
Create seed data for:
- Admin user
- Sample services
- Sample projects
- Sample blog posts
- Sample testimonials
- Sample FAQs
- Site settings

Default admin:
Email: admin@clicksoftwaregh.com
Password: password

Important:
- Hash the admin password
- Do not expose admin routes publicly
- Make all code clean and production-ready
- Avoid duplicated code
- Use reusable Blade components and partials
- Make the dashboard easy to extend later
- Do not break the existing public website design