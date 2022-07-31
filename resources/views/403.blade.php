<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    @import url("https://fonts.googleapis.com/css?family=Share+Tech+Mono|Montserrat:700");

    * {
        margin: 0;
        padding: 0;
        border: 0;
        font-size: 100%;
        font: inherit;
        vertical-align: baseline;
        box-sizing: border-box;
        color: inherit;
    }

    body {
        background-image: linear-gradient(120deg, #4f0088 0%, #000000 100%);
        height: 100vh;
    }

    h1 {
        font-size: 45vw;
        text-align: center;
        position: fixed;
        width: 100vw;
        z-index: 1;
        color: #ffffff26;
        text-shadow: 0 0 50px rgba(0, 0, 0, 0.07);
        top: 50%;
        transform: translateY(-50%);
        font-family: "Montserrat", monospace;
    }

    div {
        background: rgba(0, 0, 0, 0);
        width: 70vw;
        position: relative;
        top: 50%;
        transform: translateY(-50%);
        margin: 0 auto;
        padding: 30px 30px 10px;
        box-shadow: 0 0 150px -20px rgba(0, 0, 0, 0.5);
        z-index: 3;
    }

    P {
        font-family: "Share Tech Mono", monospace;
        color: #f5f5f5;
        margin: 0 0 20px;
        font-size: 17px;
        line-height: 1.2;
    }

    span {
        color: #f0c674;
    }

    i {
        color: #8abeb7;
    }

    div a {
        text-decoration: none;
    }

    b {
        color: #81a2be;
    }

    a.avatar {
        position: fixed;
        bottom: 15px;
        right: -100px;
        animation: slide 0.5s 4.5s forwards;
        display: block;
        z-index: 4
    }

    a.avatar img {
        border-radius: 100%;
        width: 44px;
        border: 2px solid white;
    }

    @keyframes slide {
        from {
            right: -100px;
            transform: rotate(360deg);
            opacity: 0;
        }

        to {
            right: 15px;
            transform: rotate(0deg);
            opacity: 1;
        }
    }

    .snip1457 {
  font-family: 'Raleway', Arial, sans-serif;
  border: none;
  background-color: #5666a5;
  border-radius: 5px;
  color: #ffffff;
  cursor: pointer;
  padding: 0px 30px;
  display: inline-block;
  margin: 15px 30px;
  text-transform: uppercase;
  line-height: 46px;
  font-weight: 400;
  font-size: 1em;
  outline: none;
  position: relative;
  overflow: hidden;
  font-size: 16px;
  border-radius: 23px;
  letter-spacing: 2px;
  -webkit-transform: translateZ(0);
  -webkit-transition: all 0.35s ease;
  transition: all 0.35s ease;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}
.snip1457:before {
  opacity: 0;
  content: "";
  position: absolute;
  top: 0px;
  bottom: 0px;
  left: 0px;
  right: 0px;
  border-radius: inherit;
  background-color: #ffffff;
  -webkit-transition: all 0.3s;
  transition: all 0.3s;
  -webkit-transform: translateY(100%);
  transform: translateY(100%);
}
.snip1457:after {
  position: absolute;
  top: 0px;
  bottom: 0px;
  left: 0px;
  right: 0px;
  border: 5px solid #5666a5;
  content: '';
  border-radius: inherit;
}
.snip1457:hover,
.snip1457.hover {
  background-color: #5666a5;
  color: #ffffff;
}
.snip1457:hover:before,
.snip1457.hover:before {
  -webkit-transform: translateY(0%);
  transform: translateY(0%);
  opacity: 0.25;
}

    </style>
</head>

<body>
    <h1>403</h1>
    <div>
        <p>> <span>ERROR CODE</span>: "<i>HTTP 403 Forbidden</i>"</p>
        <p>> <span>ERROR DESCRIPTION</span>: "<i>Access Denied. You Do Not Have The Permission To Access This Page On
                This Server</i>"</p>
        <p>> <span>ERROR POSSIBLY CAUSED BY</span>: [<b>execute access forbidden</b>...]</p>
        </p>
        <p>> <span>HOPE YOU HAVE A GOOD DAY</span>: [<b>Thế Anh</b>...]</p>
        <button class="snip1457" onclick="quay_lai_trang_truoc()">Back</button>    
    </div>

    <a class="avatar" href="https://codepen.io/leenalavanya/"
        title="If you liked this pen, don't forget to heart, share and follow ❤"><img
            src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/157344/profile/profile-512.jpg?1535437978" /></a>
    <script>
    var str = document.getElementsByTagName('div')[0].innerHTML.toString();
    var i = 0;
    document.getElementsByTagName('div')[0].innerHTML = "";

    setTimeout(function() {
        var se = setInterval(function() {
            i++;
            document.getElementsByTagName('div')[0].innerHTML = str.slice(0, i) + "|";
            if (i == str.length) {
                clearInterval(se);
                document.getElementsByTagName('div')[0].innerHTML = str;
            }
        }, 10);
    }, 0);
    </script>
    <script>
    function quay_lai_trang_truoc() {
        history.back();
    }
    $(".hover").mouseleave(
  function () {
    $(this).removeClass("hover");
  }
);
    </script>
</body>

</html>