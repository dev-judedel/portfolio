// Enhanced Professional Constellation Animation - Interactive Magnetic Theme
document.addEventListener('DOMContentLoaded', function() {
    const canvas = document.getElementById('particle-canvas');
    if (!canvas) {
        console.error('Canvas element not found!');
        return;
    }
    
    console.log('Constellation animation initializing...');
    
    const ctx = canvas.getContext('2d');
    let particles = [];
    let mouse = { 
        x: null, 
        y: null, 
        radius: 120,           // Slightly smaller interaction radius
        magnetRadius: 160      // Limited attraction range to keep it subtle
    };
    let stars = [];
    let canvasRect = canvas.getBoundingClientRect();
    
    function refreshCanvasRect() {
        canvasRect = canvas.getBoundingClientRect();
    }

    // Set canvas size (matches the hero orb wrapper)
    function setCanvasSize() {
        refreshCanvasRect();
        canvas.width = canvasRect.width;
        canvas.height = canvasRect.height;
        if (canvas.width === 0 || canvas.height === 0) {
            console.log('Canvas area currently collapsed; waiting for visible dimensions.');
        } else {
            console.log(`Canvas size set to: ${canvas.width}x${canvas.height}`);
        }
    }
    setCanvasSize();
    
    window.addEventListener('resize', function() {
        setCanvasSize();
        if (canvas.width && canvas.height) {
            init();
        }
    });

    if (canvas.width && canvas.height) {
        init();
    }
    
    function updateMousePosition(clientX, clientY) {
        refreshCanvasRect();
        const withinX = clientX >= canvasRect.left && clientX <= canvasRect.right;
        const withinY = clientY >= canvasRect.top && clientY <= canvasRect.bottom;
        if (withinX && withinY) {
            mouse.x = clientX - canvasRect.left;
            mouse.y = clientY - canvasRect.top;
        } else {
            mouse.x = null;
            mouse.y = null;
        }
    }
    
    // Mouse events - track through document body (canvas is pointer-events-none)
    document.addEventListener('mousemove', function(event) {
        updateMousePosition(event.clientX, event.clientY);
    });
    
    document.addEventListener('mouseout', function() {
        mouse.x = null;
        mouse.y = null;
    });
    
    // Touch events for mobile - track through document
    document.addEventListener('touchstart', function(event) {
        if (event.touches.length > 0) {
            const touch = event.touches[0];
            updateMousePosition(touch.clientX, touch.clientY);
        }
    }, { passive: true });
    
    document.addEventListener('touchmove', function(event) {
        if (event.touches.length > 0) {
            const touch = event.touches[0];
            updateMousePosition(touch.clientX, touch.clientY);
        }
    }, { passive: true });
    
    document.addEventListener('touchend', function() {
        mouse.x = null;
        mouse.y = null;
    }, { passive: true });
    
    // Twinkle star class for ultra-subtle background
    class Star {
        constructor() {
            this.x = Math.random() * canvas.width;
            this.y = Math.random() * canvas.height;
            this.size = Math.random() * 0.8 + 0.2;
            this.speedX = Math.random() * 0.02 - 0.01;
            this.speedY = Math.random() * 0.02 - 0.01;
            this.baseOpacity = Math.random() * 0.3 + 0.1;
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
    
    // Enhanced Constellation Particle with Magnetic Attraction
    class Particle {
        constructor() {
            this.x = Math.random() * canvas.width;
            this.y = Math.random() * canvas.height;
            this.size = Math.random() * 1.2 + 0.8;
            this.baseX = this.x;
            this.baseY = this.y;
            this.density = (Math.random() * 15) + 8;
            this.speedX = Math.random() * 0.15 - 0.075;
            this.speedY = Math.random() * 0.15 - 0.075;
            this.glowSize = this.size + Math.random() * 1.2;
            this.baseOpacity = Math.random() * 0.3 + 0.5;
            this.pulseSpeed = Math.random() * 0.001 + 0.0005;
            this.pulsePhase = Math.random() * Math.PI * 2;
            
            // For magnetic effect
            this.vx = 0;
            this.vy = 0;
            this.friction = 0.95;
            this.attractionStrength = 0.3; // Medium strength
        }
        
        draw(isNearMouse = false) {
            // Subtle pulse
            this.pulsePhase += this.pulseSpeed;
            let pulseOpacity = this.baseOpacity + Math.sin(this.pulsePhase) * 0.2;
            
            // Enhanced glow when near mouse
            let currentGlowSize = this.glowSize;
            if (isNearMouse) {
                pulseOpacity = Math.min(1, pulseOpacity * 1.2);
                currentGlowSize = this.size + 2;
            }
            
            // Ultra-subtle glow effect
            const gradient = ctx.createRadialGradient(this.x, this.y, 0, this.x, this.y, currentGlowSize);
            gradient.addColorStop(0, `rgba(255, 255, 255, ${pulseOpacity * 0.45})`);
            gradient.addColorStop(0.5, `rgba(255, 255, 255, ${pulseOpacity * 0.12})`);
            gradient.addColorStop(1, 'rgba(255, 255, 255, 0)');
            
            ctx.fillStyle = gradient;
            ctx.beginPath();
            ctx.arc(this.x, this.y, currentGlowSize, 0, Math.PI * 2);
            ctx.fill();
            
            // Core star - brighter when near mouse
            ctx.fillStyle = `rgba(255, 255, 255, ${pulseOpacity})`;
            ctx.beginPath();
            ctx.arc(this.x, this.y, isNearMouse ? this.size * 1.3 : this.size, 0, Math.PI * 2);
            ctx.fill();
        }
        
        update() {
            // Normal drift movement
            this.x += this.speedX;
            this.y += this.speedY;
            
            // Magnetic attraction to mouse
            if (mouse.x != null && mouse.y != null) {
                let dx = mouse.x - this.x;
                let dy = mouse.y - this.y;
                let distance = Math.sqrt(dx * dx + dy * dy);
                
                // Magnetic attraction effect (pulls particles toward cursor)
                if (distance < mouse.magnetRadius) {
                    let forceDirectionX = dx / distance;
                    let forceDirectionY = dy / distance;
                    
                    // Stronger attraction when closer
                    let attractionForce = (mouse.magnetRadius - distance) / mouse.magnetRadius;
                    attractionForce = Math.pow(attractionForce, 1.5); // Exponential falloff
                    
                    // Apply magnetic force
                    this.vx += forceDirectionX * attractionForce * this.attractionStrength;
                    this.vy += forceDirectionY * attractionForce * this.attractionStrength;
                }
            }
            
            // Apply velocity
            this.x += this.vx;
            this.y += this.vy;
            
            // Apply friction to slow down
            this.vx *= this.friction;
            this.vy *= this.friction;
            
            // Wrap around edges
            if (this.x < 0) this.x = canvas.width;
            if (this.x > canvas.width) this.x = 0;
            if (this.y < 0) this.y = canvas.height;
            if (this.y > canvas.height) this.y = 0;
        }
    }
    
    // Initialize particles and stars - responsive count
    function init() {
        particles = [];
        stars = [];
        
        // Responsive background stars
        let numberOfStars = Math.floor((canvas.width * canvas.height) / 5000);
        for (let i = 0; i < numberOfStars; i++) {
            stars.push(new Star());
        }
        
        // Fixed particle count to keep animation consistent
        let numberOfParticles = 69;
        
        console.log(`Initializing ${numberOfParticles} particles and ${numberOfStars} stars`);
        
        for (let i = 0; i < numberOfParticles; i++) {
            particles.push(new Particle());
        }
        
        console.log('Initialization complete!');
    }
    
    // Connect particles to form subtle constellations
    function connect() {
        let particlesNearMouse = [];
        const connectionDistance = 80;

        for (let a = 0; a < particles.length; a++) {
            // Check if particle is near mouse for special effects
            if (mouse.x != null && mouse.y != null) {
                let dx = mouse.x - particles[a].x;
                let dy = mouse.y - particles[a].y;
                let distanceToMouse = Math.sqrt(dx * dx + dy * dy);
                
                if (distanceToMouse < mouse.radius) {
                    particlesNearMouse.push(a);
                }
            }
            
            // Connect particles to each other
            for (let b = a + 1; b < particles.length; b++) {
                let dx = particles[a].x - particles[b].x;
                let dy = particles[a].y - particles[b].y;
                let distance = Math.sqrt(dx * dx + dy * dy);
                
                if (distance < connectionDistance) {
                    let opacity = (1 - (distance / connectionDistance)) * 0.35;
                    
                    let isNearMouse = particlesNearMouse.includes(a) || particlesNearMouse.includes(b);
                    if (isNearMouse) {
                        opacity = Math.min(0.4, opacity + 0.05);
                    }
                    
                    ctx.strokeStyle = `rgba(255, 255, 255, ${opacity * 0.8})`;
                    ctx.lineWidth = isNearMouse ? 0.2 : 0.14;
                    ctx.beginPath();
                    ctx.moveTo(particles[a].x, particles[a].y);
                    ctx.lineTo(particles[b].x, particles[b].y);
                    ctx.stroke();
                }
            }
        }
        
        return particlesNearMouse;
    }
    
    // Connect particles to mouse cursor
    function connectToMouse(particlesNearMouse) {
        if (mouse.x == null || mouse.y == null) return;
        
        for (let i = 0; i < particlesNearMouse.length; i++) {
            let particle = particles[particlesNearMouse[i]];
            let dx = mouse.x - particle.x;
            let dy = mouse.y - particle.y;
            let distance = Math.sqrt(dx * dx + dy * dy);
            
        if (distance < mouse.radius) {
            let opacity = 1 - (distance / mouse.radius);
            opacity = Math.pow(opacity, 2);
            
            ctx.strokeStyle = `rgba(255, 255, 255, ${opacity * 0.4})`;
            ctx.lineWidth = 0.25;
            ctx.beginPath();
            ctx.moveTo(particle.x, particle.y);
            ctx.lineTo(mouse.x, mouse.y);
            ctx.stroke();
        }
        }
        
        // Draw subtle glow at cursor position
        if (particlesNearMouse.length > 0) {
            ctx.fillStyle = 'rgba(255, 255, 255, 0.04)';
            ctx.beginPath();
            ctx.arc(mouse.x, mouse.y, 18, 0, Math.PI * 2);
            ctx.fill();
        }
    }
    
    let frameCount = 0;
    
    // Animation loop with slower fade for smoother effect
    function animate() {
        frameCount++;
        
        // Debug first frame
        if (frameCount === 1) {
            console.log('First frame rendering...');
        }
        
        // Slower fade for smoother trails
        ctx.fillStyle = 'rgba(0, 0, 0, 0.03)';
        ctx.fillRect(0, 0, canvas.width, canvas.height);
        
        // Draw and update stars first (background layer)
        for (let i = 0; i < stars.length; i++) {
            stars[i].update();
            stars[i].draw();
        }
        
        // Update all particles
        for (let i = 0; i < particles.length; i++) {
            particles[i].update();
        }
        
        // Draw constellation connections and get particles near mouse
        let particlesNearMouse = connect();
        
        // Draw connections to mouse cursor
        connectToMouse(particlesNearMouse);
        
        // Draw constellation particles (foreground layer)
        for (let i = 0; i < particles.length; i++) {
            let isNearMouse = particlesNearMouse.includes(i);
            particles[i].draw(isNearMouse);
        }
        
        requestAnimationFrame(animate);
    }
    
    animate();
    
    console.log('Constellation animation started!');
});
