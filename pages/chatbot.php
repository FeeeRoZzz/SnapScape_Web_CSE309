<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="../favicon.ico">

    <!-- Bootstrap & Other CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/owl.carousel.min.css">
    <link rel="stylesheet" href="../css/owl.theme.default.min.css">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../css/style.css">
    <!-- Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Inter Font CDN -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500&display=swap" rel="stylesheet">

    <title>SnapScape : AI Chatbot </title>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        /* Glassmorphism Card */
        .glass-card {
            background: rgba(17, 24, 39, 0.1);
            backdrop-filter: blur(8px);
            border: 1px solid rgba(255, 255, 255, 0.03);
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.2), inset 0 0 10px rgba(59, 130, 246, 0.15);
            border-radius: 2rem;
        }

        /* Gradient Background */
        .bg-section {
            background: linear-gradient(135deg, #0f172a 0%, #1e40af 100%);
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
        }

        /* Neural Network Animation */
        .neural-network {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            opacity: 0.15;
        }
        .node {
            position: absolute;
            background: #3b82f6;
            border-radius: 50%;
            animation: pulseNode 3s infinite ease-in-out;
        }
        .connection {
            position: absolute;
            background: linear-gradient(to right, #3b82f6, transparent);
            height: 1px;
            animation: pulseConnection 2s infinite ease-in-out;
        }
        @keyframes pulseNode {
            0%, 100% { transform: scale(1); opacity: 0.3; }
            50% { transform: scale(1.2); opacity: 0.6; }
        }
        @keyframes pulseConnection {
            0%, 100% { opacity: 0.15; }
            50% { opacity: 0.4; }
        }

        /* Gradient Buttons */
        .btn-gradient {
            background: linear-gradient(to right, #3b82f6, #4f46e5);
            transition: transform 0.3s ease-out, box-shadow 0.3s ease-out;
        }
        .btn-gradient:hover {
            transform: scale(1.1);
            box-shadow: 0 6px 12px rgba(59, 130, 246, 0.3);
        }
        .btn-gradient-red {
            background: linear-gradient(to right, #ef4444, #db2777);
            transition: transform 0.3s ease-out, box-shadow 0.3s ease-out;
        }
        .btn-gradient-red:hover {
            transform: scale(1.1);
            box-shadow: 0 6px 12px rgba(239, 68, 68, 0.3);
        }

        /* Fade-in Animation */
        .fade-in {
            opacity: 0;
            animation: fadeIn 1s ease-out forwards;
        }
        @keyframes fadeIn {
            to { opacity: 1; transform: translateY(0); }
        }

        /* Bounce-in Animation for Messages */
        .message-user, .message-bot {
            animation: bounceIn 0.4s ease-out;
        }
        @keyframes bounceIn {
            0% { transform: translateY(8px) scale(0.98); opacity: 0; }
            60% { transform: translateY(-2px) scale(1.03); opacity: 1; }
            100% { transform: translateY(0) scale(1); opacity: 1; }
        }

        /* Typing Effect */
        .typing-indicator {
            display: flex;
            gap: 8px;
        }
        .typing-dot {
            width: 8px;
            height: 8px;
            background: #3b82f6;
            border-radius: 50%;
            box-shadow: 0 0 8px rgba(59, 130, 246, 0.6);
            animation: typing 0.8s infinite;
        }
        .typing-dot:nth-child(2) { animation-delay: 0.2s; }
        .typing-dot:nth-child(3) { animation-delay: 0.4s; }
        @keyframes typing {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-4px); }
        }

        /* Chat Container */
        .chat-container {
            height: 600px;
            overflow-y: auto;
            scroll-behavior: smooth;
            background: rgba(31, 41, 55, 0.2);
            border-radius: 1.5rem;
            padding: 1.5rem;
        }

        /* Message Styling */
        .message-user, .message-bot {
            margin-bottom: 4px;
            padding: 10px 16px;
            font-size: 1rem;
            line-height: 1.5rem;
            max-width: 85%;
            border-radius: 1.5rem;
            font-weight: 500;
        }
        .message-user {
            margin-left: auto;
            background: linear-gradient(to right, #10b981, #059669);
        }
        .message-bot {
            background: linear-gradient(to right, #3b82f6, #4f46e5);
        }
    </style>
</head>

<body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="70">

    <!-- FIRST NAVBAR -->
    <div class="top-nav" id="home">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-auto">
                    <p><i class='bx bxs-envelope'></i> Contact@Snapscape.com.bd</p>
                    <p><i class='bx bxs-phone-call'></i> +8801872801865</p>
                </div>
                <div class="col-auto social-icons">
                    <a href="https://www.facebook.com/Feeerozzz"><i class='bx bxl-facebook'></i></a>
                    <a href="https://www.instagram.com/Feeerozzz"><i class='bx bxl-instagram'></i></a>
                    <a href="https://www.github.com/Feeerozzz"><i class='bx bxl-github'></i></a>
                    <a href="https://www.linkedin.com/Ferozmahmud36"><i class='bx bxl-linkedin'></i></a>
                </div>
            </div>
        </div>
    </div>

    <!-- 2ND NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top">
        <div class="container">
            <a class="navbar-brand" href="../index.php">SNAPSCAPE<span class="dot">.</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../#home">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../#about">ABOUT</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../#services">SERVICES</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../#portfolio">COURSES</a>
                    </li>
                </ul>
                <!-- <a href="login.php" class="btn btn-brand ms-lg-3">LOG IN</a> -->
                <a href="Ai.php" class="btn btn-brand ms-lg-3">AI TOOLS ⚡</a>
            </div>
        </div>
    </nav>

    <!-- CHATBOT SECTION -->
    <section class="py-8 bg-section relative flex items-center">
        <div class="neural-network">
            <div class="node" style="width: 5px; height: 5px; top: 20%; left: 15%; animation-delay: 0s;"></div>
            <div class="node" style="width: 6px; height: 6px; top: 50%; left: 40%; animation-delay: 1s;"></div>
            <div class="node" style="width: 8px; height: 8px; top: 70%; left: 80%; animation-delay: 2s;"></div>
            <div class="connection" style="width: 70px; top: 20%; left: 15%; transform: rotate(45deg);"></div>
            <div class="connection" style="width: 90px; top: 50%; left: 40%; transform: rotate(-30deg);"></div>
        </div>
        <div class="container mx-auto px-4 max-w-6xl">
            <h2 class="text-2xl font-medium text-center text-white mb-6 fade-in">AI CHATBOT</h2>
            <p class="text-center text-gray-300 text-base mb-10 max-w-lg mx-auto fade-in" style="animation-delay: 0.2s;">
                Ask Our AI For Photography Tips , Editing Tricks & SnapScape’s AI Tools. Your Creative Companion Awaits ! 📸
            </p>
            <div class="glass-card p-6 max-w-4xl mx-auto fade-in" style="animation-delay: 0.4s;">
                <!-- Chat Container -->
                <div class="chat-container" id="chatContainer">
                    <div class="message-bot text-white">
                        Hey there! I'm SnapScape’s AI Assistant. Ask about photography, editing, or our AI tools! 📸
                    </div>
                </div>
                <!-- Typing Indicator -->
                <div id="typingIndicator" class="hidden text-gray-300 mb-4">
                    <div class="typing-indicator">
                        <span class="typing-dot"></span>
                        <span class="typing-dot"></span>
                        <span class="typing-dot"></span>
                    </div>
                </div>
                <!-- Input Area -->
                <div class="flex gap-3">
                    <input type="text" id="chatInput" placeholder="Type your question..." class="flex-1 h-12 px-4 rounded-full bg-gray-800 text-white text-sm border border-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <button id="sendButton" class="btn-gradient text-white w-12 h-12 rounded-full flex items-center justify-center text-base">
                        <i class='bx bx-send'></i>
                    </button>
                    <button id="clearButton" class="btn-gradient-red text-white w-12 h-12 rounded-full flex items-center justify-center text-base">
                        <i class='bx bx-trash'></i>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- FOOTER START -->
    <footer>
        <div class="footer-top text-center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 text-center">
                        <h4 class="navbar-brand">SNAPSCAPE<span class="dot">.</span></h4>
                        <p>At SnapScape, we empower photography enthusiasts by combining creativity with cutting-edge technology.
                            Whether you’re a beginner or a pro, we help you capture, edit, and elevate your photos effortlessly.</p>
                        <div class="col-auto social-icons">
                            <a href="https://www.facebook.com/Feeerozzz"><i class='bx bxl-facebook'></i></a>
                            <a href="https://www.instagram.com/Feeerozzz"><i class='bx bxl-instagram'></i></a>
                            <a href="https://www.github.com/Feeerozzz"><i class='bx bxl-github'></i></a>
                            <a href="https://www.linkedin.com/Ferozmahmud36"><i class='bx bxl-linkedin'></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom text-center">
            <p class="mb-0">Copyright By SnapScape Bangladesh (2025). All rights Reserved</p>
            Distributed By <a href="#">FEROZ MAHMUD</a>
        </div>
    </footer>

    <!-- JAVASCRIPT LINKERS -->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/owl.carousel.min.js"></script>
    <script src="../js/app.js"></script>

    <!-- Chatbot Logic and Animations -->
    <script>
        const chatContainer = document.getElementById('chatContainer');
        const chatInput = document.getElementById('chatInput');
        const sendButton = document.getElementById('sendButton');
        const clearButton = document.getElementById('clearButton');
        const typingIndicator = document.getElementById('typingIndicator');

        // Comprehensive mock response dataset
        const responseMap = [
            {
                keywords: ['lighting', 'light', 'bright', 'brightness', 'illuminate'],
                regex: /light|bright|illuminate/i,
                response: 'To improve photo lighting, shoot during golden hour (sunrise/sunset) for soft, warm tones. Indoors, use diffusers or softboxes. In SnapScape’s retouching tool, adjust the brightness slider to enhance exposure.'
            },
            {
                keywords: ['skin', 'smoothing', 'blemish', 'retouch face', 'complexion'],
                regex: /skin|smoothing|blemish|complexion|face/i,
                response: 'Skin smoothing uses AI to reduce blemishes and even out skin tones. In SnapScape’s retouching tool, use the skin smoothing slider (0 to 1) for natural, professional results without looking overdone.'
            },
            {
                keywords: ['portrait', 'portraits', 'camera settings', 'people'],
                regex: /portrait|people|settings/i,
                response: 'For portraits, use a wide aperture (f/1.8-f/2.8) for a blurry background, ISO 100-400 for low noise, and shutter speed 1/200s or faster. SnapScape’s AI can enhance portraits with skin smoothing and filters.'
            },
            {
                keywords: ['remove', 'object', 'erase', 'delete', 'background'],
                regex: /remove|erase|delete|object|background/i,
                response: 'To remove objects, use SnapScape’s AI retouching tool. Upload your photo, specify the object (e.g., “sign”), and the AI will erase it. For complex cases, manual selection may improve accuracy.'
            },
            {
                keywords: ['filter', 'filters', 'preset', 'effect', 'style'],
                regex: /filter|preset|effect|style/i,
                response: 'Filters add artistic flair to your photos. SnapScape offers AI presets like Vivid, Soft Glow, and Classic in the retouching tool. Try the “Vivid” preset for vibrant colors!'
            },
            {
                keywords: ['edit', 'editing', 'retouch', 'post-process', 'enhance'],
                regex: /edit|retouch|enhance|process/i,
                response: 'Photo editing can elevate your images! SnapScape’s AI tools let you adjust brightness, contrast, saturation, apply skin smoothing, or add filters. Start with small tweaks for natural results.'
            },
            {
                keywords: ['snapscape', 'features', 'tools', 'ai tools', 'website'],
                regex: /snapscape|features|tools/i,
                response: 'SnapScape offers AI-powered photo retouching, background removal, and an AI chatbot! Adjust brightness, contrast, skin smoothing, apply filters, or remove objects with our intuitive tools. Explore the AI Tools section!'
            },
            {
                keywords: ['macro', 'close-up', 'detail'],
                regex: /macro|close-up|detail/i,
                response: 'For macro photography, use a macro lens, small aperture (f/8-f/16) for depth of field, and a tripod for stability. SnapScape’s retouching tool can enhance details with contrast and saturation adjustments.'
            },
            {
                keywords: ['landscape', 'scenery', 'nature'],
                regex: /landscape|scenery|nature/i,
                response: 'For landscapes, use a small aperture (f/11-f/16) for sharpness, low ISO (100-200), and a tripod for long exposures. Enhance colors with SnapScape’s Vivid filter or saturation slider.'
            },
            {
                keywords: ['composition', 'frame', 'rule of thirds'],
                regex: /composition|frame|thirds/i,
                response: 'Good composition follows the rule of thirds: place key elements along imaginary grid lines. Use leading lines or symmetry for impact. SnapScape’s AI can’t frame shots but can enhance the final image!'
            }
        ];

        const defaultResponse = 'I’m not sure about that, but try asking about photography tips, editing, or SnapScape features! 📸';

        function addMessage(content, isUser = false) {
            const messageDiv = document.createElement('div');
            messageDiv.className = `text-white ${isUser ? 'message-user' : 'message-bot'}`;
            messageDiv.textContent = content;
            chatContainer.appendChild(messageDiv);
            chatContainer.scrollTop = chatContainer.scrollHeight;
        }

        function getBotResponse(message) {
            typingIndicator.classList.remove('hidden');
            return new Promise(resolve => {
                setTimeout(() => {
                    const lowerMessage = message.toLowerCase().trim();
                    const matchedResponse = responseMap.find(item => 
                        item.regex.test(lowerMessage) || 
                        item.keywords.some(keyword => lowerMessage.includes(keyword))
                    );
                    typingIndicator.classList.add('hidden');
                    resolve(matchedResponse ? matchedResponse.response : defaultResponse);
                }, 1000); // Simulate API delay
            });
        }

        sendButton.addEventListener('click', async () => {
            const message = chatInput.value.trim();
            if (!message) return;

            addMessage(message, true);
            chatInput.value = '';

            const response = await getBotResponse(message);
            addMessage(response);
        });

        chatInput.addEventListener('keypress', (e) => {
            if (e.key === 'Enter') {
                sendButton.click();
            }
        });

        clearButton.addEventListener('click', () => {
            chatContainer.innerHTML = `
                <div class="message-bot text-white">
                    Hey there! I'm SnapScape’s AI Assistant. Ask about photography, editing, or our AI tools! 📸
                </div>
            `;
        });
    </script>
</body>

</html>