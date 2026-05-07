<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('admins', function (Blueprint $t) {
            $t->id();
            $t->string('name');
            $t->string('email')->unique();
            $t->string('password');
            $t->string('role')->default('admin');
            $t->string('status')->default('active');
            $t->rememberToken();
            $t->timestamps();
        });

        Schema::create('pages', function (Blueprint $t) {
            $t->id();
            $t->string('slug')->unique();
            $t->string('title_en');
            $t->string('title_fr')->nullable();
            $t->longText('content_en')->nullable();
            $t->longText('content_fr')->nullable();
            $t->string('meta_title_en')->nullable();
            $t->string('meta_title_fr')->nullable();
            $t->string('meta_description_en')->nullable();
            $t->string('meta_description_fr')->nullable();
            $t->string('status')->default('draft');
            $t->timestamps();
        });

        Schema::create('services', function (Blueprint $t) {
            $t->id();
            $t->string('slug')->unique();
            $t->string('icon')->nullable();
            $t->string('title_en');
            $t->string('title_fr')->nullable();
            $t->text('short_description_en')->nullable();
            $t->text('short_description_fr')->nullable();
            $t->longText('description_en')->nullable();
            $t->longText('description_fr')->nullable();
            $t->json('benefits_en')->nullable();
            $t->json('benefits_fr')->nullable();
            $t->string('image')->nullable();
            $t->integer('sort_order')->default(0);
            $t->boolean('is_featured')->default(false);
            $t->string('status')->default('published');
            $t->string('meta_title_en')->nullable();
            $t->string('meta_title_fr')->nullable();
            $t->string('meta_description_en')->nullable();
            $t->string('meta_description_fr')->nullable();
            $t->timestamps();
        });

        Schema::create('projects', function (Blueprint $t) {
            $t->id();
            $t->string('slug')->unique();
            $t->string('title_en');
            $t->string('title_fr')->nullable();
            $t->string('category_en')->nullable();
            $t->string('category_fr')->nullable();
            $t->string('client_name')->nullable();
            $t->text('short_description_en')->nullable();
            $t->text('short_description_fr')->nullable();
            $t->longText('description_en')->nullable();
            $t->longText('description_fr')->nullable();
            $t->longText('problem_en')->nullable();
            $t->longText('problem_fr')->nullable();
            $t->longText('solution_en')->nullable();
            $t->longText('solution_fr')->nullable();
            $t->json('features_en')->nullable();
            $t->json('features_fr')->nullable();
            $t->json('technologies')->nullable();
            $t->string('image')->nullable();
            $t->json('gallery')->nullable();
            $t->string('project_url')->nullable();
            $t->date('completion_date')->nullable();
            $t->boolean('is_featured')->default(false);
            $t->string('status')->default('published');
            $t->string('meta_title_en')->nullable();
            $t->string('meta_title_fr')->nullable();
            $t->string('meta_description_en')->nullable();
            $t->string('meta_description_fr')->nullable();
            $t->timestamps();
        });

        Schema::create('blog_posts', function (Blueprint $t) {
            $t->id();
            $t->string('slug')->unique();
            $t->string('title_en');
            $t->string('title_fr')->nullable();
            $t->text('excerpt_en')->nullable();
            $t->text('excerpt_fr')->nullable();
            $t->longText('content_en')->nullable();
            $t->longText('content_fr')->nullable();
            $t->string('category_en')->nullable();
            $t->string('category_fr')->nullable();
            $t->string('image')->nullable();
            $t->string('author_name')->nullable();
            $t->dateTime('published_at')->nullable();
            $t->string('status')->default('draft');
            $t->string('meta_title_en')->nullable();
            $t->string('meta_title_fr')->nullable();
            $t->string('meta_description_en')->nullable();
            $t->string('meta_description_fr')->nullable();
            $t->timestamps();
        });

        Schema::create('testimonials', function (Blueprint $t) {
            $t->id();
            $t->string('client_name');
            $t->string('company_name')->nullable();
            $t->string('position')->nullable();
            $t->text('message_en');
            $t->text('message_fr')->nullable();
            $t->unsignedTinyInteger('rating')->default(5);
            $t->string('image')->nullable();
            $t->string('status')->default('active');
            $t->integer('sort_order')->default(0);
            $t->timestamps();
        });

        Schema::create('team_members', function (Blueprint $t) {
            $t->id();
            $t->string('name');
            $t->string('position_en');
            $t->string('position_fr')->nullable();
            $t->text('bio_en')->nullable();
            $t->text('bio_fr')->nullable();
            $t->string('image')->nullable();
            $t->string('email')->nullable();
            $t->string('linkedin')->nullable();
            $t->string('twitter')->nullable();
            $t->integer('sort_order')->default(0);
            $t->string('status')->default('active');
            $t->timestamps();
        });

        Schema::create('faqs', function (Blueprint $t) {
            $t->id();
            $t->string('question_en');
            $t->string('question_fr')->nullable();
            $t->text('answer_en');
            $t->text('answer_fr')->nullable();
            $t->integer('sort_order')->default(0);
            $t->string('status')->default('active');
            $t->timestamps();
        });

        Schema::create('contact_messages', function (Blueprint $t) {
            $t->id();
            $t->string('full_name');
            $t->string('email');
            $t->string('phone')->nullable();
            $t->string('organization')->nullable();
            $t->string('service')->nullable();
            $t->text('message');
            $t->string('status')->default('unread');
            $t->timestamps();
        });

        Schema::create('quote_requests', function (Blueprint $t) {
            $t->id();
            $t->string('full_name');
            $t->string('email');
            $t->string('phone');
            $t->string('organization')->nullable();
            $t->string('project_type');
            $t->string('budget_range')->nullable();
            $t->date('deadline')->nullable();
            $t->longText('project_description');
            $t->string('attachment')->nullable();
            $t->string('status')->default('new');
            $t->timestamps();
        });

        Schema::create('media', function (Blueprint $t) {
            $t->id();
            $t->string('file_name');
            $t->string('file_path');
            $t->string('file_type')->nullable();
            $t->unsignedBigInteger('file_size')->default(0);
            $t->string('alt_text_en')->nullable();
            $t->string('alt_text_fr')->nullable();
            $t->unsignedBigInteger('uploaded_by')->nullable();
            $t->timestamps();
        });

        Schema::create('site_settings', function (Blueprint $t) {
            $t->id();
            $t->string('key')->unique();
            $t->text('value_en')->nullable();
            $t->text('value_fr')->nullable();
            $t->string('type')->default('text');
            $t->string('group')->default('general');
            $t->timestamps();
        });
    }

    public function down(): void
    {
        foreach ([
            'site_settings','media','quote_requests','contact_messages','faqs',
            'team_members','testimonials','blog_posts','projects','services','pages','admins'
        ] as $tbl) {
            Schema::dropIfExists($tbl);
        }
    }
};
