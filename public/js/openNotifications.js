let divNotifications = document.getElementById('notifications');

const openOrCloseNotifications = () => {
    divNotifications.classList.contains('hidden') ? divNotifications.classList.remove('hidden') : divNotifications.classList.add('hidden')
}