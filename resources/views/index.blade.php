<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern Posts Design</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%);
            min-height: 100vh;
            padding: 20px;
            position: relative;
            overflow-x: hidden;
        }

        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: 
                radial-gradient(circle at 20% 80%, rgba(120, 119, 198, 0.3) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(255, 255, 255, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 40% 40%, rgba(120, 119, 198, 0.2) 0%, transparent 50%);
            pointer-events: none;
            z-index: -1;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .header {
            text-align: center;
            margin-bottom: 50px;
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(20px);
            border-radius: 25px;
            padding: 40px;
            border: 1px solid rgba(255, 255, 255, 0.3);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            position: relative;
            overflow: hidden;
        }

        .header::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.1), transparent);
            animation: shimmer 3s infinite;
            pointer-events: none;
        }

        @keyframes shimmer {
            0% { transform: translateX(-100%) translateY(-100%) rotate(45deg); }
            100% { transform: translateX(100%) translateY(100%) rotate(45deg); }
        }

        .header h1 {
            color: white;
            font-size: 3rem;
            margin-bottom: 15px;
            text-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
            font-weight: 700;
            letter-spacing: -1px;
            background: linear-gradient(135deg, #fff, #f0f8ff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .header p {
            color: rgba(255, 255, 255, 0.9);
            font-size: 1.1rem;
            margin-bottom: 30px;
            font-weight: 400;
        }

        .create-btn {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            background: linear-gradient(135deg, #ff6b6b, #ee5a24, #ff7675);
            color: white;
            text-decoration: none;
            padding: 18px 35px;
            border-radius: 50px;
            font-weight: 600;
            font-size: 1.1rem;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            box-shadow: 0 10px 30px rgba(238, 90, 36, 0.4);
            border: none;
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }

        .create-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }

        .create-btn:hover::before {
            left: 100%;
        }

        .create-btn:hover {
            transform: translateY(-3px) scale(1.05);
            box-shadow: 0 15px 40px rgba(238, 90, 36, 0.6);
        }

        .create-btn:active {
            transform: translateY(-1px) scale(1.02);
        }

        .success-message {
            background: linear-gradient(135deg, #00b894, #00cec9, #55efc4);
            color: white;
            padding: 20px 30px;
            border-radius: 20px;
            margin: 25px 0;
            text-align: center;
            font-weight: 500;
            box-shadow: 0 10px 30px rgba(0, 184, 148, 0.4);
            animation: successSlide 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 15px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        @keyframes successSlide {
            from {
                opacity: 0;
                transform: translateY(-30px) scale(0.9);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        .success-message .close-btn {
            position: absolute;
            right: 20px;
            background: rgba(255, 255, 255, 0.2);
            border: none;
            color: white;
            width: 35px;
            height: 35px;
            border-radius: 50%;
            cursor: pointer;
            font-size: 20px;
            font-weight: bold;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            backdrop-filter: blur(5px);
        }

        .success-message .close-btn:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: scale(1.1) rotate(90deg);
        }

        .posts-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
            gap: 40px;
            margin-top: 30px;
            justify-items: center;
        }

        .post-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 25px;
            padding: 0;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            border: 1px solid rgba(255, 255, 255, 0.3);
            position: relative;
            overflow: hidden;
            backdrop-filter: blur(10px);
            width: 100%;
            max-width: 450px;
        }

        .post-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(90deg, #667eea, #764ba2, #f093fb);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .post-card:hover::before {
            opacity: 1;
        }

        .post-card:hover {
            transform: translateY(-15px) scale(1.02);
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.2);
        }

        .post-image-container {
            position: relative;
            overflow: hidden;
            border-radius: 25px 25px 0 0;
            height: 280px;
            background: linear-gradient(135deg, #f5f7fa, #c3cfe2);
        }

        .post-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
            transition: transform 0.4s ease;
            border-radius: 25px 25px 0 0;
        }

        .post-card:hover .post-img {
            transform: scale(1.1);
        }

        .post-content {
            padding: 30px;
        }

        .post-header {
            margin-bottom: 15px;
        }

        .post-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: #2d3436;
            line-height: 1.3;
            margin-bottom: 8px;
            background: linear-gradient(135deg, #2d3436, #636e72);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .post-meta {
            color: #74b9ff;
            font-size: 0.9rem;
            font-weight: 500;
        }

        .post-description {
            color: #636e72;
            line-height: 1.7;
            margin-bottom: 25px;
            font-size: 1rem;
        }

        .post-actions {
            display: flex;
            gap: 15px;
            align-items: center;
            justify-content: space-between;
            margin-top: 25px;
            padding-top: 25px;
            border-top: 1px solid rgba(0, 0, 0, 0.1);
        }

        .edit-btn {
            background: linear-gradient(135deg, #74b9ff, #0984e3);
            color: white;
            text-decoration: none;
            padding: 12px 25px;
            border-radius: 25px;
            font-size: 0.9rem;
            font-weight: 600;
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            box-shadow: 0 8px 20px rgba(116, 185, 255, 0.3);
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .edit-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 30px rgba(116, 185, 255, 0.5);
            background: linear-gradient(135deg, #0984e3, #74b9ff);
        }

        .delete-form {
            margin: 0;
        }

        .delete-btn {
            background: linear-gradient(135deg, #fd79a8, #e84393);
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 25px;
            font-size: 0.9rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            box-shadow: 0 8px 20px rgba(253, 121, 168, 0.3);
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .delete-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 30px rgba(253, 121, 168, 0.5);
            background: linear-gradient(135deg, #e84393, #fd79a8);
        }

        .no-posts {
            grid-column: 1 / -1;
            text-align: center;
            padding: 80px 40px;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 25px;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .no-posts-icon {
            font-size: 5rem;
            margin-bottom: 30px;
            opacity: 0.7;
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }

        .no-posts h3 {
            color: white;
            font-size: 1.8rem;
            margin-bottom: 15px;
            font-weight: 600;
        }

        .no-posts p {
            color: rgba(255, 255, 255, 0.8);
            font-size: 1.1rem;
            line-height: 1.6;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .container {
                padding: 0 15px;
            }

            .header {
                padding: 30px 20px;
            }

            .header h1 {
                font-size: 2.2rem;
            }

            .posts-grid {
                grid-template-columns: 1fr;
                gap: 25px;
            }

            .post-card {
                margin: 0 auto;
                max-width: 500px;
            }

            .post-actions {
                flex-direction: column;
                gap: 15px;
            }

            .edit-btn, .delete-btn {
                width: 100%;
                justify-content: center;
            }

            .success-message {
                padding: 20px 50px 20px 30px;
                text-align: left;
            }
        }

        @media (max-width: 480px) {
            body {
                padding: 15px;
            }

            .header {
                padding: 25px 15px;
            }

            .header h1 {
                font-size: 1.8rem;
            }

            .create-btn {
                padding: 15px 30px;
                font-size: 1rem;
            }

            .post-content {
                padding: 25px 20px;
            }

            .post-image-container {
                height: 220px;
            }

            .posts-grid {
                grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
                gap: 30px;
            }
        }

        /* Loading Animation */
        .loading {
            opacity: 0;
            animation: fadeIn 0.6s ease forwards;
        }

        @keyframes fadeIn {
            to { opacity: 1; }
        }

        /* Hover Effects */
        .post-card .post-title {
            transition: all 0.3s ease;
        }

        .post-card:hover .post-title {
            transform: translateX(5px);
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header Section -->
        <div class="header">
            <h1>✨ My Amazing Posts</h1>
            <p>Discover and share your thoughts with the world</p>
            <!-- Replace href with your Laravel route -->
            <a href="{{ route('posts.create') }}" class="create-btn">
                <span>➕</span>
                Create New Post
            </a>
            
            <!-- Success Message with Close Button -->
            @if (session('success'))
                <div class="success-message" id="successMessage">
                    <span>✅ {{ session('success') }}</span>
                    <button class="close-btn" onclick="closeSuccessMessage()" title="Close">&times;</button>
                </div>
            @endif
        </div>

        <!-- Posts Grid -->
        <div class="posts-grid">
            <!-- Loop through posts -->
            @forelse ($posts as $post)
                <div class="post-card loading">
                    <!-- Image Container -->
                    @if ($post->image)
                        <div class="post-image-container">
                            <img src="{{ asset('images/' . $post->image) }}" class="post-img" alt="{{ $post->title }}">
                        </div>
                    @endif
                    
                    <!-- Content Container -->
                    <div class="post-content">
                        <div class="post-header">
                            <h2 class="post-title">{{ $post->title }}</h2>
                            <div class="post-meta">
                                📝 {{ $post->created_at ? $post->created_at->format('M d, Y') : 'Just now' }}
                            </div>
                        </div>
                        
                        <p class="post-description">
                            {{ Str::limit($post->description, 150) }}
                        </p>
                        
                        <!-- Action buttons -->
                        <div class="post-actions">
                            <a href="{{ route('posts.edit', $post) }}" class="edit-btn">
                                <span>✏️</span>
                                Edit Post
                            </a>
                            <form class="delete-form" action="{{ route('posts.destroy', $post) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this post?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-btn">
                                    <span>🗑️</span>
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <!-- No posts found -->
                <div class="no-posts">
                    <div class="no-posts-icon">📝</div>
                    <h3>No Posts Yet</h3>
                    <p>Your creative journey starts here! Create your first post and share your amazing ideas with the world.</p>
                </div>
            @endforelse
        </div>
    </div>

    <script>
        // Function to close success message
        function closeSuccessMessage() {
            const successMessage = document.getElementById('successMessage');
            if (successMessage) {
                successMessage.style.animation = 'successSlide 0.3s ease reverse';
                setTimeout(() => {
                    successMessage.remove();
                }, 300);
            }
        }

        // Auto-hide success message after 6 seconds
        document.addEventListener('DOMContentLoaded', function() {
            const successMessage = document.getElementById('successMessage');
            if (successMessage) {
                setTimeout(() => {
                    closeSuccessMessage();
                }, 6000);
            }

            // Add staggered animation to cards
            const cards = document.querySelectorAll('.post-card');
            cards.forEach((card, index) => {
                setTimeout(() => {
                    card.style.animationDelay = `${index * 0.1}s`;
                }, index * 100);
            });

            // Enhanced interactive effects
            const postCards = document.querySelectorAll('.post-card');
            
            postCards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-15px) scale(1.02)';
                    this.style.boxShadow = '0 30px 60px rgba(0, 0, 0, 0.2)';
                });
                
                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0) scale(1)';
                    this.style.boxShadow = '0 20px 40px rgba(0, 0, 0, 0.1)';
                });
            });

            // Add ripple effect to buttons
            const buttons = document.querySelectorAll('.create-btn, .edit-btn, .delete-btn');
            buttons.forEach(button => {
                button.addEventListener('click', function(e) {
                    const ripple = document.createElement('span');
                    const rect = this.getBoundingClientRect();
                    const size = Math.max(rect.width, rect.height);
                    const x = e.clientX - rect.left - size / 2;
                    const y = e.clientY - rect.top - size / 2;
                    
                    ripple.style.width = ripple.style.height = size + 'px';
                    ripple.style.left = x + 'px';
                    ripple.style.top = y + 'px';
                    ripple.classList.add('ripple');
                    
                    ripple.style.position = 'absolute';
                    ripple.style.borderRadius = '50%';
                    ripple.style.background = 'rgba(255, 255, 255, 0.3)';
                    ripple.style.transform = 'scale(0)';
                    ripple.style.animation = 'ripple 0.6s linear';
                    ripple.style.pointerEvents = 'none';
                    
                    this.appendChild(ripple);
                    
                    setTimeout(() => {
                        ripple.remove();
                    }, 600);
                });
            });
        });

        // Add CSS for ripple animation
        const style = document.createElement('style');
        style.textContent = `
            @keyframes ripple {
                to {
                    transform: scale(4);
                    opacity: 0;
                }
            }
            
            .create-btn, .edit-btn, .delete-btn {
                position: relative;
                overflow: hidden;
            }
        `;
        document.head.appendChild(style);
    </script>
</body>
</html>