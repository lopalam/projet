// ./public/javascript.js

// Get the current username from the cookies
var user = cookie.get('user');
if (!user) {

    // Ask for the username if there is none set already
    user = prompt('Choisir un nom d\'utilisateur:');
    if (!user) {
        alert('Veuillez respecter les regles d\'utilisation du site!');
    } else {
        // Store it in the cookies for future use
        cookie.set('user', user);
    }
}

var socket = io();

// The user count. Can change when someone joins/leaves
socket.on('count', function(data) {
    $('.user-count').html(data);
    console.log();
});

// When we receive a message
// it will be like { user: 'username', message: 'text' }
socket.on('message', function(data) {
    console.log(data);
    $('.chat').append('<p><strong>' + data.user + '</strong>: ' + data.message + '</p>');


});

// When the form is submitted
$('form').submit(function(e) {
    // Avoid submitting it through HTTP
    e.preventDefault();

    // Retrieve the message from the user
    var message = $(e.target).find('input').val();
    // Send the message to the server
    socket.emit('message', {
        user: cookie.get('user') || 'Anonymous',
        message: message
    });

    // Clear the input and focus it for a new message
    e.target.reset();
    $(e.target).find('input').focus();
});