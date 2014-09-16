/**
 * Created by Nick on 8/3/14.
 */

//create view model
var PhoneViewModel =
{
    showPhoneCheckinPushed : function()
    {
        if (!$('#divPhoneNumber').is(':visible'))
        {
            $('#divPhoneNumber').show('fast');
            $('#divRegisterNew').hide('fast');
            $('#liPhoneNumberCheckinMenu').addClass('selected');
            $('#liRegisterNewMenu').removeClass('selected');
        }
    },
    registerNewPushed : function()
    {
        if (!$('#divRegisterNew').is(':visible'))
        {
            $('#divRegisterNew').show('fast');
            $('#divPhoneNumber').hide('fast');
            $('#liRegisterNewMenu').addClass('selected');
            $('#liPhoneNumberCheckinMenu').removeClass('selected');
        }
    },
    button0Pushed : function () { updateIt('0'); },
    button1Pushed : function () { updateIt('1'); },
    button2Pushed : function () { updateIt('2'); },
    button3Pushed : function () { updateIt('3'); },
    button4Pushed : function () { updateIt('4'); },
    button5Pushed : function () { updateIt('5'); },
    button6Pushed : function () { updateIt('6'); },
    button7Pushed : function () { updateIt('7'); },
    button8Pushed : function () { updateIt('8'); },
    button9Pushed : function () { updateIt('9'); },
    buttonBackSpacePushed : function()
    {
        var currVal = PhoneViewModel.phoneNumber();

        if (currVal)
        {
            PhoneViewModel.phoneNumber(currVal.substr(0, currVal.length - 1));//take one away
        }
    },
    buttonClearPushed : function ()
    {
        PhoneViewModel.phoneNumber('');//clear
    },
    phoneNumber : ko.observable()
};

//update function for the phone number box
var updateIt = function(value)
{
    if (!(parseInt(value) == NaN))
    {
        var currVal = PhoneViewModel.phoneNumber();

        if (currVal == undefined || currVal.length < 10)
        {
            PhoneViewModel.phoneNumber((currVal == undefined ? '' : currVal)  + value);
        }
    }
};
ko.applyBindings(PhoneViewModel);

//ensure only numbers are entered
$('#txtPhoneNumber').bind('keypress', function(event)
{
    if (!(event.keyCode >= 48 && event.keyCode <= 57))
    {
        event.preventDefault();
        event.stopPropagation();
    }
});
$('#txtPhoneNumber').focus(function ()
{
    this.select();
});
$('#btn7').fastClick(function(e)
{
    PhoneViewModel.button7Pushed();
});
$('#btn8').fastClick(function(e)
{
    PhoneViewModel.button8Pushed();
});
$('#btn9').fastClick(function(e)
{
    PhoneViewModel.button9Pushed();
});
$('#btn4').fastClick(function(e)
{
    PhoneViewModel.button4Pushed();
});
$('#btn5').fastClick(function(e)
{
    PhoneViewModel.button5Pushed();
});
$('#btn6').fastClick(function(e)
{
    PhoneViewModel.button6Pushed();
});
$('#btn1').fastClick(function(e)
{
    PhoneViewModel.button1Pushed();
});
$('#btn2').fastClick(function(e)
{
    PhoneViewModel.button2Pushed();
});
$('#btn3').fastClick(function(e)
{
    PhoneViewModel.button3Pushed();
});
$('#btn0').fastClick(function(e)
{
    PhoneViewModel.button0Pushed();
});
$('#btnBack').fastClick(function(e)
{
    PhoneViewModel.buttonBackSpacePushed();
});
$('#btnClear').fastClick(function(e)
{
    PhoneViewModel.buttonClearPushed();
});


