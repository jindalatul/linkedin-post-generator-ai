const quill = new Quill('#editor', {
    theme: 'snow'
});

function expandPost()
{
    //alert("#more-expand-post");
    let social_linkedin_post_contents = quill.getSemanticHTML();
    $("#social-linkedin-post-content").html(social_linkedin_post_contents);

    $("#social-linkedin-post-content").css("height", "auto");
    $(".custom-box").css("height", "auto");
    $(".mx-auto").css("height", "auto");
}

$(document).ready(function(){
    $("#post-text-editor").hide();
    
    $("#Generate-Prompt-Again").click(function(){
        //alert("Generate-Prompt-Again");
        $("#post-text-editor").hide();
        $("#post-preview").hide();
        $("#loader-spinner").hide();
        $("#linkedIn-prompt-form").show();
    });

    $("#post-preview-btn").click(function(){
        
        let social_linkedin_post_contents = quill.getSemanticHTML();

        //.ops[0].insert;
        //console.log(social_linkedin_post_contents);
        if(social_linkedin_post_contents.length>200)
        {
            social_linkedin_post_contents = social_linkedin_post_contents.substring(0,200);
            social_linkedin_post_contents+=' ...<a href="#" id="more-expand-post" onclick="expandPost()">more</a>';
            
            //console.clear();
            //console.log(social_linkedin_post_contents);

            $("#social-linkedin-post-content").html(social_linkedin_post_contents);


        }
        else
        {
            $("#social-linkedin-post-content").html(social_linkedin_post_contents);
        }
        //console.clear
        $("#post-preview").show();
    });

   /*
    $("#more-expand-post").click(function(){
        alert("#more-expand-post");
        $("#social-linkedin-post-content").css("height", "auto");
        $(".custom-box").css("height", "auto");
        $(".mx-auto").css("height", "auto");
        

    });
    */

    $("#copy-post").click(function(){
            // Get the text field
            var copyText =  quill.getContents().ops[0].insert;
            var dummy = document.createElement("input");
            dummy.setAttribute("type", "text");
            dummy.value = copyText;

            dummy.style.display = 'none'
            document.body.appendChild(dummy);

            dummy.select();
            dummy.setSelectionRange(0, 99999); // For mobile devices
            navigator.clipboard.writeText(dummy.value);

            document.body.removeChild(dummy);

            // Alert the copied text
            alert("Copied the text");
    });

    $("#generate-posts-btn").click(function(){
        // Validation
        $("#topic").removeClass("text-box-error");

        var inp = $("#topic").val();
        if($.trim(inp).length <= 0)
        {
            $("#topic").addClass("text-box-error");
            return false;
        }

        //topic tone

        // AJAX Request
        $("#linkedIn-prompt-form").hide();
        $("#loader-spinner").show();
        //alert("generate-posts-btn");

        var hashtags="no";
        var emoji="no";
        
        if ($("#hashtags:checked").is(":checked"))  hashtags="yes";
        
        if ($("#emoji:checked").is(":checked")) emoji="yes";

        $.post("./api/call.php",
        {
          topic: $("#topic").val(),
          tone: $("#tone").val(),
          hashtags:hashtags,
          emoji:emoji
        },
        function(data, status){
          
          $("#loader-spinner").hide();
          //console.log(data);
          quill.setContents([{ insert: data }]);
          quill.focus();
          
          $("#post-text-editor").show();

        });
        return false;
  });
  
});
