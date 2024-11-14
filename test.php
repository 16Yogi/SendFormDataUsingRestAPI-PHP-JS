<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" onsubmit="submitfun()">
        <input type="first name" placeholder="fname" name="fname" id="fname">
        <input type="second name" placeholder="lname" name="lname" id="lname">
        <input type="submit" name="submit" value="submit" id="submit">
    </form>
</body>
</html>

<script>
    function submitfun(){
        var fname = document.getElementById("fname").value;
        var lname = document.getElementById("lname").value;

        console.log(fname);
        console.log(lname);

        fetch('api.php',{
            header:{
                'Content-Type':'application/json'
            },
            method:'POST',
            body:JSON.stringify({
                fname : fname,
                lname : lname
            })
        })
        .then(response => response.json())
        .then(data=>{
            if(data.message == "Inserted"){
                showPopupBtn.click();
            }
        })
        .catch(error => console.error('Error:',error));
    }
</script>

 -->


 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Submission</title>
</head>
<body>
    <form action="" onsubmit="return submitfun()">
        <input type="text" placeholder="First Name" name="fname" id="fname">
        <input type="text" placeholder="Last Name" name="lname" id="lname">
        <input type="submit" name="submit" value="Submit" id="submit">
        <!-- Add this button somewhere in your HTML -->
        <button id="showPopupBtn" style="display: none;" onclick="alert('Data inserted successfully!')">Show Popup</button>
        <!-- Add a hidden button or some other element to show the popup -->
        <button id="showPopupBtn" style="display: none;" onclick="alert('Data inserted successfully!')">Show Popup</button>

    </form>
</body>
</html>

<script>
    // function submitfun() {
    //     var fname = document.getElementById("fname").value;
    //     var lname = document.getElementById("lname").value;

    //     console.log(fname);
    //     console.log(lname);

    //     fetch('api.php', {
    //         headers: {  // Fixed the 'header' to 'headers'
    //             'Content-Type': 'application/json'
    //         },
    //         method: 'POST',
    //         body: JSON.stringify({
    //             fname: fname,
    //             lname: lname
    //         })
    //     })
    //     .then(response => response.json())
    //     .then(data => {
    //         if (data.message === "Inserted") {
    //             // Assuming showPopupBtn is a button you want to trigger
    //             showPopupBtn.click();
    //         } else {
    //             alert("Error: Data not inserted.");
    //         }
    //     })
    //     .catch(error => console.error('Error:', error));

    //     return false;  // Prevent form from submitting and page from refreshing
    // }



    function submitfun() {
    var fname = document.getElementById("fname").value;
    var lname = document.getElementById("lname").value;

    console.log(fname);
    console.log(lname);

    fetch('api.php', {
        headers: {
            'Content-Type': 'application/json'
        },
        method: 'POST',
        body: JSON.stringify({
            fname: fname,
            lname: lname
        })
    })
    .then(response => response.json())
    // .then(data => {
    //     if (data.message === "Inserted") {
    //         // Replace this with an alert or any action you want after successful insert
    //         alert("Data inserted successfully!");
    //     } else {
    //         alert("Error: Data not inserted.");
    //     }
    // })
    .then(data => {
        if (data.message === "Inserted") {
            // Reset the entire form
            document.querySelector("form").reset();  // Resets all form fields

            // Optionally, show a success message or trigger a popup
            alert("Data inserted successfully!");
        } else {
            alert("Error: Data not inserted.");
        }
    })
    .catch(error => console.error('Error:', error));

    return false;  // Prevent form from submitting and page from refreshing
}

</script>
