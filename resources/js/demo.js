(function(){
    'use strict';

    /**
     * Example: Animated On Page Load
     */
    var processAnimated = document.getElementById('processAnimated');
    var animate = processAnimated.querySelectorAll('.animate');
    setTimeout(function() {
        for (var i = 0; i < animate.length; i++) {
            animate[i].classList.remove('animate');
        }
    }, 100);

    /**
     * Example: Animated With JavaScript
     */
    var processAnimated2 = document.getElementById('processAnimated2');
    var nextStep = document.getElementById('nextStep');
    nextStep.onclick = goToNextStep;
    function goToNextStep(event) {
        var active = processAnimated2.querySelector('.active');
        var next = active.nextElementSibling;
        if(next){
            active.classList.remove('active');
            active.classList.add('previous');
            next.classList.add('active');
        }
    }

})();
