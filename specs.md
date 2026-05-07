Build a complete Laravel website for “Click Software GH”, a software development and IT solutions company based in Kumasi, Ghana.

Use Laravel Blade templates with clean reusable layouts and components.

Project structure:
- Use a main layout file: resources/views/layouts/app.blade.php
- Create Blade components or partials for:
  navbar
  footer
  hero-section
  service-card
  project-card
  blog-card
  testimonial-card
  cta-section
  contact-form
  quote-form
- Create routes in web.php for:
  /
  /about
  /services
  /projects
  /projects/{slug}
  /blog
  /blog/{slug}
  /contact
  /request-quote
  /privacy-policy
  /terms

Company information:
- Name: Click Software GH
- Industry: Software Development / IT Services
- Location: Kumasi, Ashanti, Ghana
- Address: PLT2 BLK3, Abrepo Bronikrom, Kumasi, Ghana
- Email: info@clicksoftwaregh.com
- Phone: +233 0249966680 / +233 0267077811
- Brand message: “High Level Multi-technology solution for best living”

Pages to build:

1. Home
Create a modern landing page with:
- Hero section
- Services preview
- Why choose us
- Portfolio preview
- Testimonials
- CTA section

2. About
Include:
- Company overview
- Mission
- Vision
- Core values
- Team section
- Experience/timeline section

3. Services
Create detailed cards for:
- Website Design and Development
- Mobile App Development
- Custom Software Development
- School Management Systems
- Hospital / Clinic Management Systems
- Business Management Systems
- E-commerce Solutions
- Domain, Hosting and Email Setup
- IT Consultancy
- System Maintenance and Support
- Digital Transformation Consulting
- UI/UX Design

4. Projects
Create portfolio listing using sample static data in the controller or directly in Blade.

5. Project Details
Create a reusable project details page based on slug.

6. Blog
Create blog listing using sample static data.

7. Blog Details
Create reusable blog details page based on slug.

8. Contact
Create a contact form with Laravel validation:
- full_name
- email
- phone
- organization
- service
- message

9. Request Quote
Create a quote request form with Laravel validation:
- full_name
- email
- phone
- organization
- project_type
- budget_range
- deadline
- project_description

For now, when forms are submitted:
- Validate input
- Return back with success message
- Do not send email yet
- Prepare the controller so email sending can be added later

Design:
- Use Tailwind CSS
- Make the design modern and responsive
- Use colors: dark navy, blue, white, cyan/green accent
- Add smooth hover effects
- Add sticky navbar
- Add mobile menu
- Add floating WhatsApp button
- Add footer with quick links and contact details
- Use professional placeholder images
- Use icons from Font Awesome, Heroicons, or Lucide if available

SEO:
- Add dynamic page titles
- Add meta descriptions
- Use semantic HTML
- Use clean URLs

Deliverables:
- Laravel routes
- Controllers
- Blade views
- Components/partials
- Tailwind-based responsive design
- Contact and quote form validation
- Sample static project and blog data
- Clean, production-ready code

Make the final website professional, trustworthy, modern, and suitable for a Ghanaian software company serving local and international clients.