// Ultra-Subtle Professional Constellation Animation - Minimalist Space Theme
document.addEventListener('DOMContentLoaded', function() {
    const canvas = document.getElementById('particle-canvas');
    if (!canvas) return;
    
    const ctx = canvas.getContext('2d');
    let particles = [];
    let mouse = { x: null, y: null, radius: 120 };
    let stars = [];
    
    // Set canvas size
    function setCanvasSize() {
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;
    }
    setCanvasSize();
    
    window.addEventListener('resize', function() {
        setCanvasSize();
        init();
    });
    
    // Mouse events - very subtle interaction
    window.addEventListener('mousemove', function(event) {
        mouse.x = event.x;
        mouse.y = event.y;
    });
    
    window.addEventListener('mouseout', function() {
        mouse.x = null;
        mouse.y = null;
    });
    
    // Twinkle star class for ultra-subtle background
    class Star {
        constructor() {
            this.x = Math.random() * canvas.width;
            this.y = Math.random() * canvas.height;
            this.size = Math.random() * 0.8 + 0.2; // Smaller stars
            this.speedX = Math.random() * 0.02 - 0.01; // Slower movement
            this.speedY = Math.random() * 0.02 - 0.01;
            this.baseOpacity = Math.random() * 0.3 + 0.1; // Lower opacity
            this.opacity = this.baseOpacity;
            this.twinkleSpeed = Math.random() * 0.002 + 0.001;
            this.twinklePhase = Math.random() * Math.PI * 2;
        }
        
        update() {
            // Very slow drift
            this.x += this.speedX;
            this.y += this.speedY;
            
            // Wrap around edges
            if (this.x < 0 || this.x > canvas.width) this.x = Math.random() * canvas.width;
            if (this.y < 0 || this.y > canvas.height) this.y = Math.random() * canvas.height;
            
            // Subtle twinkle effect
            this.twinklePhase += this.twinkleSpeed;
            this.opacity = this.baseOpacity + Math.sin(this.twinklePhase) * 0.15;
        }
        
        draw() {
            ctx.fillStyle = `rgba(255, 255, 255, ${this.opacity})`;
            ctx.beginPath();
            ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
            ctx.fill();
        }
    }
    
    // Minimalist Constellation Particle
    class Particle {
        constructor() {
            this.x = Math.random() * canvas.width;
            this.y = Math.random() * canvas.height;
            this.size = Math.random() * 1.2 + 0.8; // Smaller particles
            this.baseX = this.x;
            this.baseY = this.y;
            this.density = (Math.random() * 20) + 5;
            this.speedX = Math.random() * 0.15 - 0.075; // Slower movement
            this.speedY = Math.random() * 0.15 - 0.075;
            this.glowSize = this.size + Math.random() * 2;
            this.baseOpacity = Math.random() * 0.3 + 0.5;
            this.pulseSpeed = Math.random() * 0.001 + 0.0005;
            this.pulsePhase = Math.random() * Math.PI * 2;
        }
        
        draw() {
            // Subtle pulse
            this.pulsePhase += this.pulseSpeed;
            const pulseOpacity = this.baseOpacity + Math.sin(this.pulsePhase) * 0.2;
            
            // Ultra-subtle glow effect
            const gradient = ctx.createRadialGradient(this.x, this.y, 0, this.x, this.y, this.glowSize);
            gradient.addColorStop(0, `rgba(255, 255, 255, ${pulseOpacity * 0.6})`);
            gradient.addColorStop(0.5, `rgba(255, 255, 255, ${pulseOpacity * 0.2})`);
            gradient.addColorStop(1, 'rgba(255, 255, 255, 0)');
            
            ctx.fillStyle = gradient;
            ctx.beginPath();
            ctx.arc(this.x, this.y, this.glowSize, 0, Math.PI * 2);
            ctx.fill();
            
            // Core star - subtle
            ctx.fillStyle = `rgba(255, 255, 255, ${pulseOpacity})`;
            ctx.beginPath();
            ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
            ctx.fill();
        }
        
        update() {
            // Ultra-slow drift movement
            this.x += this.speedX;
            this.y += this.speedY;
            
            // Wrap around edges
            if (this.x < 0) this.x = canvas.width;
            if (this.x > canvas.width) this.x = 0;
            if (this.y < 0) this.y = canvas.height;
            if (this.y > canvas.height) this.y = 0;
            
            // Very subtle mouse interaction
            if (mouse.x != null && mouse.y != null) {
                let dx = mouse.x - this.x;
                let dy = mouse.y - this.y;
                let distance = Math.sqrt(dx * dx + dy * dy);
                
                if (distance < mouse.radius) {
                    let forceDirectionX = dx / distance;
                    let forceDirectionY = dy / distance;
                    let force = (mouse.radius - distance) / mouse.radius;
                    let directionX = forceDirectionX * force * this.density * 0.15; // Reduced force
                    let directionY = forceDirectionY * force * this.density * 0.15;
                    
                    this.x -= directionX;
                    this.y -= directionY;
                }
            }
        }
    }
    
    // Initialize particles and stars
    function init() {
        particles = [];
        stars = [];
        
        // Fewer background stars for cleaner look
        let numberOfStars = (canvas.width * canvas.height) / 5000;
        for (let i = 0; i < numberOfStars; i++) {
            stars.push(new Star());
        }
        
        // Fewer constellation particles for minimalism
        let numberOfParticles = Math.min(50, (canvas.width * canvas.height) / 15000);
        for (let i = 0; i < numberOfParticles; i++) {
            particles.push(new Particle());
        }
    }
    
    // Connect particles to form subtle constellations
    function connect() {
        for (let a = 0; a < particles.length; a++) {
            for (let b = a + 1; b < particles.length; b++) {
                let dx = particles[a].x - particles[b].x;
                let dy = particles[a].y - particles[b].y;
                let distance = Math.sqrt(dx * dx + dy * dy);
                
                // Shorter connection distance for cleaner look
                if (distance < 120) {
                    let opacity = 1 - (distance / 120);
                    
                    // Ultra-subtle gradient line
                    const gradient = ctx.createLinearGradient(
                        particles[a].x, particles[a].y,
                        particles[b].x, particles[b].y
                    );
                    gradient.addColorStop(0, `rgba(255, 255, 255, ${opacity * 0.12})`);
                    gradient.addColorStop(0.5, `rgba(255, 255, 255, ${opacity * 0.18})`);
                    gradient.addColorStop(1, `rgba(255, 255, 255, ${opacity * 0.12})`);
                    
                    ctx.strokeStyle = gradient;
                    ctx.lineWidth = 0.3; // Thinner lines
                    ctx.beginPath();
                    ctx.moveTo(particles[a].x, particles[a].y);
                    ctx.lineTo(particles[b].x, particles[b].y);
                    ctx.stroke();
                }
            }
        }
    }
    
    // Animation loop with slower fade for smoother effect
    function animate() {
        // Slower fade for smoother trails
        ctx.fillStyle = 'rgba(0, 0, 0, 0.03)';
        ctx.fillRect(0, 0, canvas.width, canvas.height);
        
        // Draw and update stars first (background layer)
        for (let i = 0; i < stars.length; i++) {
            stars[i].update();
            stars[i].draw();
        }
        
        // Draw constellation connections
        connect();
        
        // Draw constellation particles (foreground layer)
        for (let i = 0; i < particles.length; i++) {
            particles[i].update();
            particles[i].draw();
        }
        
        requestAnimationFrame(animate);
    }
    
    init();
    animate();
});
