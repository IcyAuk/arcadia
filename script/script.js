//top
function scrollToTop() {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
}

// HABITATS.PHP
// False Modal
// hide section 1 when u do stuff, show section 2
// vice versa for section 2
document.addEventListener('DOMContentLoaded', function () {
    const habitatButtons = document.querySelectorAll('.habitat-button');
    const habitatSection = document.getElementById('habitat-section')
    const modalSection = document.getElementById('modal-section');

        //cycle through each button in section habitit
        // listen to every button
    habitatButtons.forEach(button => {
        button.addEventListener('click', () => {
            habitatSection.classList.add('hidden');
            modalSection.classList.remove('hidden');
            scrollToTop();
        });
    });

    const backButton = document.querySelectorAll('.back-button');
    backButton.forEach(button=>{

        button.addEventListener('click', () => {
            modalSection.classList.add('hidden');
            habitatSection.classList.remove('hidden');
            scrollToTop();
        });
    })
});