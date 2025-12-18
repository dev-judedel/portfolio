{{-- Global Animation Styles --}}
<style>
    /* Fade In Animation */
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    /* Fade In Up Animation */
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    /* Slow Spin */
    @keyframes spinSlow {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }
    
    /* Reverse Spin */
    @keyframes spinReverse {
        from { transform: rotate(360deg); }
        to { transform: rotate(0deg); }
    }
    
    /* Orbit Animation */
    @keyframes orbit {
        from { transform: rotate(0deg) translateX(200px) rotate(0deg); }
        to { transform: rotate(360deg) translateX(200px) rotate(-360deg); }
    }
    
    /* Orbit Reverse */
    @keyframes orbitReverse {
        from { transform: rotate(360deg) translateX(150px) rotate(-360deg); }
        to { transform: rotate(0deg) translateX(150px) rotate(0deg); }
    }
    
    /* Pulse Slow */
    @keyframes pulseSlow {
        0%, 100% { opacity: 0.3; }
        50% { opacity: 0.6; }
    }
    
    /* Bounce Slow */
    @keyframes bounceSlow {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-10px); }
    }
    
    /* Shimmer Effect */
    @keyframes shimmer {
        0% { transform: translateX(-100%); }
        100% { transform: translateX(100%); }
    }
    
    /* Animation Classes */
    .animate-fade-in {
        animation: fadeIn 1s ease-out forwards;
    }
    
    .animate-fade-in-up {
        animation: fadeInUp 0.8s ease-out forwards;
    }
    
    .animate-spin-slow {
        animation: spinSlow 60s linear infinite;
    }
    
    .animate-spin-reverse {
        animation: spinReverse 45s linear infinite;
    }
    
    .animate-orbit {
        animation: orbit 20s linear infinite;
    }
    
    .animate-orbit-reverse {
        animation: orbitReverse 25s linear infinite;
    }
    
    .animate-pulse-slow {
        animation: pulseSlow 4s ease-in-out infinite;
    }
    
    .animate-bounce-slow {
        animation: bounceSlow 3s ease-in-out infinite;
    }
    
    .animate-shimmer {
        animation: shimmer 2s ease-in-out;
    }
</style>
