// JavaScript Document
var loc = location.href.substring(location.href.lastIndexOf("/") + 1);
switch (loc) {
  case "":
    document.getElementById('home').className = "disabled";
    break;
  case "men.php":
    document.getElementById('men').className = "disabled";
    break;
  case "women.php":
    document.getElementById('women').className = "disabled";
    break;
  case "specialty.php":
    document.getElementById('specilty').className = "disabled";
    break;
  default:
    document.getElementById('home').className = "disabled";
    break;

}
