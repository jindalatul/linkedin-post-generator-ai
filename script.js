        function wait(ms)
        {
            var start = new Date().getTime();
            var end = start;
            while(end < start + ms) {
                end = new Date().getTime();
            }
        }
        $(document).ready(function(){
            $("#post-text-editor").hide();
            
            $("#Generate-Prompt-Again").click(function(){
                alert("Generate-Prompt-Again");
                $("#post-text-editor").hide();
                $("#loader-spinner").hide();
                $("#linkedIn-prompt-form").show();
            });

            $("#post-preview-btn").click(function(){
                alert("post-preview");
                $("#post-preview").show();
            });
            
            $("#generate-posts-btn").click(function(){
                alert("generate-posts-btn");
                $("#linkedIn-prompt-form").hide();
                $("#loader-spinner").show();
                //wait(6000);
                $("#post-text-editor").show();
                $("#loader-spinner").hide();
          });
          
        });
