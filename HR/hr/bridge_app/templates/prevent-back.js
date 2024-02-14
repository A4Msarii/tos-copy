// Prevent navigating back to cached pages after logout
window.addEventListener('pageshow', function (event) {
    var historyTraversal = event.persisted || (typeof window.performance != 'undefined' && window.performance.navigation.type === 2);
    if (historyTraversal) {
        // Redirect to the login page or any other desired page after logout
        window.location.href = '/login/';  // Replace with the actual URL
    }
});
