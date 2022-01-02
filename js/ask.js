const urlParams = new URLSearchParams(window.location.search);
const success = urlParams.get('success');

if (success == '') {
    alert('Success Posting!')
    location.href = "home.php"
}