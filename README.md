# Voyatek Test Project

## Installation and Setup

1. **Clone the repository**
git clone <repository_url>


2. **Navigate to the project directory**
cd Voyatek_test


3. **Install dependencies**
composer install


4. **Set up your environment variables**
- Copy `.env.example` to `.env`
- Configure your database settings in `.env`

5. **Generate application key**
php artisan key


6. **Run migrations and seeders**
php artisan migrate --seed


7. **Start the development server**
php artisan serve


## Endpoints

### Blogs

- **Fetch All Blogs**
- `GET /api/blogs`
- Retrieves all blogs.

- **Create Blog**
- `POST /api/blogs`
- Creates a new blog.

- **Fetch Blog**
- `GET /api/blogs/{id}`
- Retrieves details of a specific blog.

- *Additional Blog Endpoints as per your implementation*

### Posts

- **Fetch All Posts**
- `GET /api/blogs/{blog_id}/posts`
- Retrieves all posts under a specific blog.

- **Create Post**
- `POST /api/blogs/{blog_id}/posts`
- Creates a new post under a specific blog.

- *Additional Post Endpoints as per your implementation*

### Interactions

- **Like Post**
- `POST /api/posts/{post_id}/like`
- Likes a specific post.

- **Comment on Post**
- `POST /api/posts/{post_id}/comment`
- Adds a comment to a specific post.

- *Additional Interaction Endpoints as per your implementation*

## Notes
- Ensure you have PHP and Composer installed on your system.
- Modify `.env` file with appropriate database credentials before running migrations.
- API responses are JSON formatted as per RESTful principles.
- Ensure authentication and authorization mechanisms are implemented as needed for production use.
