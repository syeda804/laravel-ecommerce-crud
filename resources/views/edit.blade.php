<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post</title>
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
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .form-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .form-title {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
            font-size: 28px;
            font-weight: 700;
            background: linear-gradient(135deg, #667eea, #764ba2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            position: relative;
        }

        .form-title::after {
            content: '✏️';
            position: absolute;
            right: -10px;
            top: 0;
            font-size: 24px;
        }

        .form-group {
            margin-bottom: 25px;
            position: relative;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            color: #555;
            font-weight: 600;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .form-input, .form-textarea {
            width: 100%;
            padding: 15px 20px;
            border: 2px solid #e1e5e9;
            border-radius: 12px;
            font-size: 16px;
            transition: all 0.3s ease;
            background: rgba(255, 255, 255, 0.9);
            color: #333;
        }

        .form-input:focus, .form-textarea:focus {
            outline: none;
            border-color: #667eea;
            background: rgba(255, 255, 255, 1);
            box-shadow: 0 0 20px rgba(102, 126, 234, 0.1);
            transform: translateY(-2px);
        }

        .form-textarea {
            resize: vertical;
            min-height: 120px;
            font-family: inherit;
        }

        .file-input-wrapper {
            position: relative;
            overflow: hidden;
            display: inline-block;
            width: 100%;
        }

        .file-input {
            position: absolute;
            left: -9999px;
        }

        .file-input-label {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 15px 20px;
            border: 2px dashed #667eea;
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.3s ease;
            background: rgba(102, 126, 234, 0.05);
            color: #667eea;
            font-weight: 600;
        }

        .file-input-label:hover {
            background: rgba(102, 126, 234, 0.1);
            border-color: #764ba2;
            color: #764ba2;
            transform: translateY(-2px);
        }

        .file-icon {
            margin-right: 10px;
            font-size: 20px;
        }

        .current-image {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 12px;
            padding: 15px;
            border: 2px solid rgba(102, 126, 234, 0.2);
            margin-bottom: 15px;
        }

        .current-image-label {
            display: block;
            margin-bottom: 10px;
            color: #555;
            font-weight: 600;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .image-preview {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 12px;
            border: 3px solid rgba(102, 126, 234, 0.3);
            transition: all 0.3s ease;
            display: block;
            margin: 0 auto;
        }

        .image-preview:hover {
            transform: scale(1.05);
            border-color: #667eea;
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.2);
        }

        .submit-btn {
            width: 100%;
            padding: 16px;
            background: linear-gradient(135deg, #f39c12, #e67e22);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
            position: relative;
            overflow: hidden;
        }

        .submit-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 30px rgba(243, 156, 18, 0.3);
        }

        .submit-btn:active {
            transform: translateY(-1px);
        }

        .submit-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }

        .submit-btn:hover::before {
            left: 100%;
        }

        .file-note {
            font-size: 12px;
            color: #666;
            margin-top: 5px;
            font-style: italic;
        }

        @media (max-width: 480px) {
            .form-container {
                padding: 30px 20px;
                margin: 10px;
            }
            
            .form-title {
                font-size: 24px;
            }
            
            .image-preview {
                width: 120px;
                height: 120px;
            }
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2 class="form-title">Edit Post</h2>
        
        <form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label class="form-label" for="title">Title</label>
                <input type="text" 
                       id="title" 
                       name="title" 
                       class="form-input" 
                       value="{{ $post->title }}" 
                       required>
            </div>

            <div class="form-group">
                <label class="form-label" for="description">Description</label>
                <textarea id="description" 
                          name="description" 
                          class="form-textarea" 
                          required>{{ $post->description }}</textarea>
            </div>

            @if ($post->image)
                <div class="form-group">
                    <div class="current-image">
                        <span class="current-image-label">Current Image</span>
                        <img src="{{ asset('images/' . $post->image) }}" 
                             alt="Current post image" 
                             class="image-preview">
                    </div>
                </div>
            @endif

            <div class="form-group">
                <label class="form-label">Update Image</label>
                <div class="file-input-wrapper">
                    <input type="file" 
                           id="image" 
                           name="image" 
                           class="file-input" 
                           accept="image/*">
                    <label for="image" class="file-input-label">
                        <span class="file-icon">🔄</span>
                        Choose New Image (Optional)
                    </label>
                </div>
                <div class="file-note">
                    Leave empty to keep current image
                </div>
            </div>

            <button type="submit" class="submit-btn">
                Update Post
            </button>
        </form>
    </div>

    <script>
        // File input feedback
        document.getElementById('image').addEventListener('change', function(e) {
            const label = document.querySelector('.file-input-label');
            if (e.target.files.length > 0) {
                label.innerHTML = `<span class="file-icon">✅</span> ${e.target.files[0].name}`;
                label.style.background = 'rgba(76, 175, 80, 0.1)';
                label.style.borderColor = '#4CAF50';
                label.style.color = '#4CAF50';
            } else {
                label.innerHTML = '<span class="file-icon">🔄</span> Choose New Image (Optional)';
                label.style.background = 'rgba(102, 126, 234, 0.05)';
                label.style.borderColor = '#667eea';
                label.style.color = '#667eea';
            }
        });

        // Form validation feedback
        const inputs = document.querySelectorAll('.form-input, .form-textarea');
        inputs.forEach(input => {
            input.addEventListener('blur', function() {
                if (this.required && !this.value.trim()) {
                    this.style.borderColor = '#e74c3c';
                } else if (this.value.trim()) {
                    this.style.borderColor = '#4CAF50';
                }
            });
        });

        // Current image hover effect
        const imagePreview = document.querySelector('.image-preview');
        if (imagePreview) {
            imagePreview.addEventListener('click', function() {
                // Create modal overlay for full-size image view
                const modal = document.createElement('div');
                modal.style.cssText = `
                    position: fixed;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    background: rgba(0,0,0,0.8);
                    z-index: 1000;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    cursor: pointer;
                `;
                
                const fullImage = document.createElement('img');
                fullImage.src = this.src;
                fullImage.style.cssText = `
                    max-width: 90%;
                    max-height: 90%;
                    border-radius: 12px;
                    box-shadow: 0 25px 50px rgba(0,0,0,0.5);
                `;
                
                modal.appendChild(fullImage);
                document.body.appendChild(modal);
                
                modal.addEventListener('click', () => {
                    document.body.removeChild(modal);
                });
            });
        }
    </script>
</body>
</html>
