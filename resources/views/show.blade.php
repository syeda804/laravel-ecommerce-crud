<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Display</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 40px 20px;
        }

        .post-container {
            max-width: 800px;
            margin: 0 auto;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
            border: 1px solid rgba(255, 255, 255, 0.2);
            animation: slideUp 0.6s ease-out;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .post-header {
            padding: 40px 40px 20px 40px;
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.1), rgba(118, 75, 162, 0.1));
            border-bottom: 1px solid rgba(102, 126, 234, 0.1);
        }

        .post-title {
            font-size: 32px;
            font-weight: 700;
            color: #333;
            margin-bottom: 15px;
            line-height: 1.3;
            background: linear-gradient(135deg, #667eea, #764ba2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            position: relative;
        }

        .post-meta {
            display: flex;
            align-items: center;
            gap: 20px;
            color: #666;
            font-size: 14px;
            margin-top: 10px;
        }

        .meta-item {
            display: flex;
            align-items: center;
            gap: 5px;
            padding: 8px 16px;
            background: rgba(102, 126, 234, 0.1);
            border-radius: 20px;
            font-weight: 500;
        }

        .post-content {
            padding: 40px;
        }

        .post-description {
            font-size: 18px;
            line-height: 1.8;
            color: #444;
            margin-bottom: 30px;
            text-align: justify;
        }

        .post-image-container {
            text-align: center;
            margin-top: 30px;
        }

        .post-image {
            max-width: 100%;
            height: auto;
            border-radius: 16px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            transition: all 0.4s ease;
            cursor: pointer;
        }

        .post-image:hover {
            transform: scale(1.02) translateY(-5px);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.2);
        }

        .actions-bar {
            padding: 30px 40px;
            background: rgba(102, 126, 234, 0.03);
            border-top: 1px solid rgba(102, 126, 234, 0.1);
            display: flex;
            gap: 15px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .action-btn {
            padding: 12px 24px;
            border: none;
            border-radius: 25px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .btn-edit {
            background: linear-gradient(135deg, #f39c12, #e67e22);
            color: white;
        }

        .btn-edit:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(243, 156, 18, 0.3);
        }

        .btn-delete {
            background: linear-gradient(135deg, #e74c3c, #c0392b);
            color: white;
        }

        .btn-delete:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(231, 76, 60, 0.3);
        }

        .btn-back {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
        }

        .btn-back:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
        }

        /* Modal for full-size image */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.9);
            z-index: 1000;
            cursor: pointer;
            animation: fadeIn 0.3s ease;
        }

        .modal.active {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        .modal-image {
            max-width: 95%;
            max-height: 95%;
            border-radius: 12px;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.5);
            animation: zoomIn 0.3s ease;
        }

        @keyframes zoomIn {
            from { transform: scale(0.8); }
            to { transform: scale(1); }
        }

        .close-modal {
            position: absolute;
            top: 30px;
            right: 30px;
            color: white;
            font-size: 30px;
            font-weight: bold;
            cursor: pointer;
            background: rgba(0, 0, 0, 0.5);
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .close-modal:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: scale(1.1);
        }

        @media (max-width: 768px) {
            .post-container {
                margin: 20px 10px;
                border-radius: 20px;
            }
            
            .post-header, .post-content, .actions-bar {
                padding: 25px 20px;
            }
            
            .post-title {
                font-size: 24px;
            }
            
            .post-description {
                font-size: 16px;
            }
            
            .actions-bar {
                flex-direction: column;
                align-items: center;
            }
            
            .action-btn {
                width: 100%;
                justify-content: center;
                max-width: 200px;
            }
        }

        .reading-progress {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: rgba(102, 126, 234, 0.2);
            z-index: 100;
        }

        .reading-progress-bar {
            height: 100%;
            background: linear-gradient(90deg, #667eea, #764ba2);
            width: 0%;
            transition: width 0.1s ease;
        }
    </style>
</head>
<body>
    <div class="reading-progress">
        <div class="reading-progress-bar"></div>
    </div>

    <div class="post-container">
        <div class="post-header">
            <h2 class="post-title">{{ $post->title }}</h2>
            <div class="post-meta">
                <div class="meta-item">
                    <span>📅</span>
                    <span>Published {{ $post->created_at->format('d M Y') }}</span>
                </div>
                <div class="meta-item">
                    <span>👁️</span>
                    <span>Reading Time: 2 min</span>
                </div>
            </div>
        </div>

        <div class="post-content">
            <p class="post-description">{{ $post->description }}</p>
            
            @if ($post->image)
                <div class="post-image-container">
                    <img src="{{ asset('images/' . $post->image) }}" 
                         alt="{{ $post->title }}" 
                         class="post-image"
                         onclick="openModal(this.src)">
                </div>
            @endif
        </div>

        <div class="actions-bar">
            <!-- Back Button -->
            <a href="{{ url('/posts') }}" class="action-btn btn-back">
                <span>←</span>
                Back to Posts
            </a>
            
            <!-- Edit Button - MULTIPLE APPROACHES -->
            <a href="{{ url('/posts/' . $post->id . '/edit') }}" class="action-btn btn-edit">
                <span>✏️</span>
                Edit Post
            </a>
            
            <!-- Delete Button -->
            <form action="{{ url('/posts/' . $post->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this post? This action cannot be undone.')">
                @csrf
                @method('DELETE')
                <button type="submit" class="action-btn btn-delete">
                    <span>🗑️</span>
                    Delete Post
                </button>
            </form>
        </div>
    </div>

    <!-- Modal for full-size image -->
    <div class="modal" id="imageModal" onclick="closeModal()">
        <span class="close-modal" onclick="closeModal()">&times;</span>
        <img class="modal-image" id="modalImage" alt="Full size image">
    </div>

    <script>
        // Debug - Console mein check karo
        console.log('Post ID:', {{ $post->id }});
        console.log('Edit URL:', '{{ url('/posts/' . $post->id . '/edit') }}');
        
        // Image modal functionality
        function openModal(imageSrc) {
            const modal = document.getElementById('imageModal');
            const modalImage = document.getElementById('modalImage');
            modal.classList.add('active');
            modalImage.src = imageSrc;
            document.body.style.overflow = 'hidden';
        }

        function closeModal() {
            const modal = document.getElementById('imageModal');
            modal.classList.remove('active');
            document.body.style.overflow = 'auto';
        }

        // Reading progress bar
        function updateReadingProgress() {
            const windowHeight = window.innerHeight;
            const documentHeight = document.documentElement.scrollHeight - windowHeight;
            const scrolled = window.scrollY;
            const progress = (scrolled / documentHeight) * 100;
            
            document.querySelector('.reading-progress-bar').style.width = progress + '%';
        }

        window.addEventListener('scroll', updateReadingProgress);

        // Keyboard navigation
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeModal();
            }
        });

        // Smooth animations on scroll
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        });

        // Initialize
        document.addEventListener('DOMContentLoaded', function() {
            // Animate elements on load
            const elements = document.querySelectorAll('.post-image, .actions-bar');
            elements.forEach(el => {
                el.style.opacity = '0';
                el.style.transform = 'translateY(20px)';
                el.style.transition = 'all 0.6s ease';
                observer.observe(el);
            });
        });
    </script>
</body>
</html>