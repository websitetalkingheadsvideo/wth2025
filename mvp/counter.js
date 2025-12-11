
var visits = getCookie("counter")
if (!visits)
        visits = 1
else
   visits = parseInt(visits) + 1
   var expdate = new Date (); 
   expdate.setTime(expdate.getTime() + (24 * 60 * 60 * 1000 * 31 * 9));  
   setCookie("counter", visits, expdate);

if (visits == 1)
document.write("Thank you for what appears to be your first visit.")
else
document.write("Thank you for returning for what <A HREF='/cookies/'>appears</A> to be your visit number " + visits + "." )
// -->
