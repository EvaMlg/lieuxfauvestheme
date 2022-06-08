jQuery(document).ready(function(){
    jQuery("a.copy-link").click(function(e){
        e.preventDefault();
        copyToClipboard(jQuery(this).attr('href'));
        return false;
    })
})

function copyToClipboard(str){
    if (!navigator.clipboard){
        const el = document.createElement('textarea');
        el.value = str;
        el.setAttribute('readonly', '');
        el.style.position = 'absolute';
        el.style.left = '-9999px';
        document.body.appendChild(el);
        el.select();
        document.execCommand('copy');
        document.body.removeChild(el);
        displaySucessCopyMessage();
    } else{
        navigator.clipboard.writeText(str)
        .then(displaySucessCopyMessage)
        .catch(()=>alert("Votre navigateur n'autorise pas de copie de texte."));
    }  
};

function displaySucessCopyMessage(){
    if(jQuery('.copy-succes').length) return;
    let popup = jQuery('<div/>').addClass('copy-success').append(
        jQuery('<p/>').text("Url copié")
    );
    jQuery('body').prepend(
        popup
    );
    setTimeout(()=>{popup.addClass('inactive')}, 4000);
    setTimeout(()=>{popup.remove()}, 4500);
}