document.querySelector('.quiz-form').addEventListener('submit', function(event) {
    event.preventDefault();

    let score = 0;
    const form = event.target;
    const formData = new FormData(form);

    // Массив с правильными ответами
    const correctAnswers = ['correct1', 'correct2', 'correct3', 'correct4', 'correct5', 'correct6', 'correct7', 'correct8', 'correct9', 'correct10'];

    // Перебираем все ответы из формы
    for (let [key, value] of formData.entries()) {
        if (value === correctAnswers[parseInt(key.split('question')[1]) - 1]) {
            score++;
        }
    }

    // Выводим результат
    if (score === 10) {
        // Создаём новый элемент audio
        const audio = new Audio('../media/quiz.mp3');

        // Воспроизводим звук
        audio.play();

        // Выводим сообщение об успехе
        Swal.fire({
            icon: 'success',
            title: 'Поздравляем!',
            text: 'Вы набрали 10 баллов из 10!',
            confirmButtonText: 'Ок',
        });
    } else {
        Swal.fire({
            icon: 'error',
            title: 'Не все ответы верны!',
            text: `Вы набрали ${score} баллов из 10!`,
            confirmButtonText: 'Ок',
        });
        
    }
});
