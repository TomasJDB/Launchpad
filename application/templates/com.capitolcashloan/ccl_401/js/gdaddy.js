/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function(){
    $('#godaddy').click(function(){
        showGodaddyVerification();
    });
});
function showGodaddyVerification()
{//leave out the title for IE support
    window.open('https://seal.godaddy.com/verifySeal?sealID=ZsvJqWru3wF4aKd6b744h7Frs9K9nSnYYcdlnduCyI8ERgdAle5s','','width=660, height=470, top=150, left=400, titlebar=no, location=no, menubar=no, toolbar=no, status=no');
    return false;//prevent default in case it's a link
}