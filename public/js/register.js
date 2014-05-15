function formValidation()
{
    var uid = document.register.username;
    var passid = document.register.passid;
    var cpassid = document.register.cpassid;
    var uname = document.register.name;
    var ucity = document.register.city;
    var ustate = document.register.state;
    var uzip = document.register.zip;
    var uemail = document.register.email;
    var udescr = document.register.descr;
    //var umsex = document.register.male;
    //var ufsex = document.register.female;

    if(username_validation(uid,5,12))
{
    if(passid_validation(passid,7,12))
    {
        if(compare_valid(passid, cpassid))
        {
            if(allLetter(uname))
            {
                if(alpha(ucity))
                {
                    if(allLetters(ustate))
                    {
                        if(allnumeric(uzip))
                        {
                            if(ValidateEmail(uemail))
                            {
                                if(ValidateDescr(udescr))
                                {

                                }
                            }
                        }
                    }
                }
            }
        }
    }
}

    return false;


}



function username_validation(uid,mx,my)
{
    var uid_len = uid.value.length;
    if (uid_len == 0 || uid_len >= my || uid_len < mx)
    {
        alert("Username should not be empty / length be between "+mx+" to "+my);
        uid.focus();
        return false;
    }
    return true;
}
function passid_validation(passid,mx,my)
{
    var passid_len = passid.value.length;
    if (passid_len == 0 ||passid_len >= my || passid_len < mx)
    {
        alert("Password should not be empty / length be between "+mx+" to "+my);
        passid.focus();
        return false;
    }
    return true;
}
function compare_valid(passid, cpassid) {

    var fld_val;
    fld_val = passid.value;

    var fld2_val;
    fld2_val = cpassid.value;

    if (fld_val == fld2_val)
    {

        return true;

    }
    else
    {

        alert('Passwords do not match please try again');
        passid.focus();
        return false;

    }
}

function allLetter(uname)
{
    var letters = /^[A-Za-z]+$/;
    if(uname.value.match(letters))
    {
        return true;
    }
    else
    {
        alert('Name must have alphabet characters only');
        uname.focus();
        return false;
    }
}
function alpha(ucity)
{
    var letters;
    letters = /^[A-Za-z0-9.\s]+$/;
    if(ucity.value.match(letters))
    {
        return true;
    }
    else
    {
        alert('User city must have alphanumeric characters only');
        ucity.focus();
        return false;
    }
}
function allLetters(ustate)
{
    var letters = /^[A-Za-z]+$/;
    if(ustate.value.match(letters))
    {
        return true;
    }
    else
    {
        alert('State must have alphabet characters only');
        ustate.focus();
        return false;
    }
}
function allnumeric(uzip)
{
    var numbers = /^[0-9]+$/;
    if(uzip.value.match(numbers))
    {
        return true;
    }
    else
    {
        alert('ZIP code must have numeric characters only');
        uzip.focus();
        return false;
    }
}
/**
 * @return {boolean}
 */
function ValidateEmail(uemail)
{

        //var x=document.forms["resister"]["email"].value;
        var x=uemail.value;
        var atpos=x.indexOf("@");
        var dotpos=x.lastIndexOf(".");
    if (atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= x.length)
    {
        alert("Not a valid e-mail address");
        uemail.focus();
        return false;
    }
        else {
        return true;
    }
}

/*function ValidateDescr(udescr)
{
    var letters = /^[A-Za-z0-9.\s]+$/;
    if(udescr.value.match(letters))
    {
        return true;
    }
    else
    {
        alert("Please tell us a little about yourself");
        udescr.focus();
        return false;
    }
}*/




