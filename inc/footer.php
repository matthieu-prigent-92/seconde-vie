</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script>
    if (document.getElementById("message") != null || document.getElementById("message") != "") {
        console.log("Je rentre dans ma condition");
        window.onload = function() {
            setTimeout(function() {
                document.getElementById("message").style.display = "none";
            }, 5000);
        }
    }
</script>

</body>

</html>