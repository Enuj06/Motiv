
document.addEventListener('contextmenu', event => event.preventDefault());

    document.addEventListener('keydown', function (event) {
      if (event.ctrlKey && (event.key === 'c' || event.key === 'u' || event.key === 's')) {
        event.preventDefault();
      }
    });

    var ua = new UAParser();
    var result = ua.getResult();

    document.getElementById("browser").innerHTML = 
      "Browser: " + result.browser.name + " " + result.browser.version;

    document.getElementById("os").innerHTML = 
      "Operating System: " + result.os.name + " " + result.os.version;

    if (result.device.model) {
      document.getElementById("device").innerHTML = 
        "Device: " + result.device.vendor + " " + result.device.model + " (" + result.device.type + ")";
    } else {
      document.getElementById("device").innerHTML = 
        "Device: Desktop or unknown";
    }

        document.getElementById("email").innerHTML = 
      "Email: " + "devjune02@gmail.com";