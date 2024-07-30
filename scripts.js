document.addEventListener("DOMContentLoaded", function() {
    console.log("JavaScript is working!");

    var skillsSection = document.getElementById('skills');
    var skillBars = document.querySelectorAll('.skill-level');
    
    function isInViewport(element) {
        var rect = element.getBoundingClientRect();
        return (
            rect.top >= 0 &&
            rect.left >= 0 &&
            rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
            rect.right <= (window.innerWidth || document.documentElement.clientWidth)
        );
    }

    function checkSkills() {
        if (isInViewport(skillsSection)) {
            skillBars.forEach(function(skill) {
                skill.style.width = skill.dataset.skillLevel;
            });
        }
    }

    window.addEventListener('scroll', checkSkills);
    checkSkills(); // Run on load in case already in view
});
