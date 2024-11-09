<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet" />\
  <link href="style.css" rel="stylesheet" />

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h1>LinkedIn Post Generator</h1>
  <div class="row">
        <div class="col-sm-6">
            <div id="linkedIn-prompt-form">
                <div class="form-group">
                    <input class="form-control input-lg" Placeholder="Describe post" id="inputlg" type="text">
                </div>
                <div class="form-group form-group-lg">
                    <select class="form-control" id="sel1">
                        <option value="" disabled="" selected="">Select <!-- -->Tone/Style</option><option value="None" aria-label="None">None</option><option value="Casual" aria-label="Casual">Casual</option><option value="Candid" aria-label="Candid">Candid</option><option value="CEO" aria-label="CEO">CEO</option><option value="CFO" aria-label="CFO">CFO</option><option value="Cheeky" aria-label="Cheeky">Cheeky</option><option value="Cheerful" aria-label="Cheerful">Cheerful</option><option value="Confident" aria-label="Confident">Confident</option><option value="Corporate baddie" aria-label="Corporate baddie">Corporate baddie</option><option value="Cyborg" aria-label="Cyborg">Cyborg</option><option value="Digital nomad" aria-label="Digital nomad">Digital nomad</option><option value="Direct" aria-label="Direct">Direct</option><option value="Disruptor" aria-label="Disruptor">Disruptor</option><option value="Dry" aria-label="Dry">Dry</option><option value="Educational" aria-label="Educational">Educational</option><option value="Entrepreneur" aria-label="Entrepreneur">Entrepreneur</option><option value="Firm" aria-label="Firm">Firm</option><option value="Flowery" aria-label="Flowery">Flowery</option><option value="Formal" aria-label="Formal">Formal</option><option value="Frank" aria-label="Frank">Frank</option><option value="Friendly" aria-label="Friendly">Friendly</option><option value="Fun" aria-label="Fun">Fun</option><option value="Gen Z" aria-label="Gen Z">Gen Z</option><option value="Girlboss" aria-label="Girlboss">Girlboss</option><option value="Grumpy" aria-label="Grumpy">Grumpy</option><option value="Gryffindor" aria-label="Gryffindor">Gryffindor</option><option value="Helpful" aria-label="Helpful">Helpful</option><option value="Inspirational" aria-label="Inspirational">Inspirational</option><option value="Irreverent" aria-label="Irreverent">Irreverent</option><option value="Intern" aria-label="Intern">Intern</option><option value="Matter-of-fact" aria-label="Matter-of-fact">Matter-of-fact</option><option value="Motivational speaker" aria-label="Motivational speaker">Motivational speaker</option><option value="Mysterious" aria-label="Mysterious">Mysterious</option><option value="Optimistic soccer coach" aria-label="Optimistic soccer coach">Optimistic soccer coach</option><option value="Playful" aria-label="Playful">Playful</option><option value="Quiet quitter" aria-label="Quiet quitter">Quiet quitter</option><option value="Respectful" aria-label="Respectful">Respectful</option><option value="Revolutionary" aria-label="Revolutionary">Revolutionary</option><option value="Startup founder" aria-label="Startup founder">Startup founder</option><option value="Sophisticated" aria-label="Sophisticated">Sophisticated</option><option value="Stand-up comedian" aria-label="Stand-up comedian">Stand-up comedian</option><option value="Stern teacher" aria-label="Stern teacher">Stern teacher</option><option value="Succinct" aria-label="Succinct">Succinct</option><option value="Tech investor" aria-label="Tech investor">Tech investor</option><option value="Thought leader" aria-label="Thought leader">Thought leader</option><option value="Tech girlie" aria-label="Tech girlie">Tech girlie</option><option value="Witty" aria-label="Witty">Witty</option>
                    </select>
                </div>
                <div class="checkbox">
                    <label><input type="checkbox" value="">Include HashTags</label>
                </div>
                <button type="button" class="btn" id="generate-posts-btn">Generate Post</button>
            </div>
            <br>
            <div id="post-text-editor" style="display: none;">
                <div class="my-options"><a href="#" id="Generate-Prompt-Again">Generate Prompt Again</a> | <a href="#" id="post-preview-btn">Preview</a></div>
                <div id="editor">
                    <p>Hello World!</p>
                    <p>Some initial <strong>bold</strong> text</p>
                    <p><br /></p>
                </div>
            </div>
            <div class="loader" id="loader-spinner" style="display: none;"></div>
        </div>

    <div class="col-sm-6" id="post-preview" style="display: none; margin-top: 1.2rem;">
        <div class="row">
            <div class="col-sm-12" style="border:solid 1px #e5e7eb;">
                <h3>Preview Post
                <div class="btn-group" style="float:right; padding-bottom: 1rem;">
                    <button type="button" class="btn">
                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="btn-icon-size-5"><path fill-rule="evenodd" d="M6.709 0H17.29a1.326 1.326 0 0 1 1.324 1.323v21.354a1.326 1.326 0 0 1-1.323 1.324H6.708a1.327 1.327 0 0 1-1.324-1.324V1.323A1.326 1.326 0 0 1 6.71 0Zm4.112 21.883h2.359a.544.544 0 0 1 0 1.086H10.82a.545.545 0 0 1-.543-.543c0-.299.245-.543.543-.543Zm-4.234-1.032h10.826V3.15H6.587V20.85ZM16.89 1.308a.267.267 0 0 0 0 .533h.03a.267.267 0 0 0 0-.533h-.03Zm-9.812 0a.267.267 0 0 0 0 .533h.03a.267.267 0 0 0 0-.533h-.03Zm3.41 0h3.023v.533h-3.024v-.533Z" clip-rule="evenodd"></path></svg>
                    </button>
                    <button type="button" class="btn">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="btn-icon-size-5"><path fill-rule="evenodd" d="M4.245 0h15.51a1.477 1.477 0 0 1 1.472 1.473v21.055A1.477 1.477 0 0 1 19.755 24H4.245a1.477 1.477 0 0 1-1.472-1.473V1.473A1.477 1.477 0 0 1 4.245 0Zm6.542 22.4h2.426v.534h-2.426V22.4Zm.618-21.335a.267.267 0 1 0 0 .533.267.267 0 0 0 0-.533Zm1.19 0a.267.267 0 1 0 0 .533.267.267 0 0 0 0-.533Zm-8.263 1.6h15.336v18.67H4.332V2.666Z" clip-rule="evenodd"></path></svg>
                    </button>
                    <button type="button" class="btn">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="btn-icon-size-5"><path fill-rule="evenodd" d="M1.503 2C.676 2 0 2.677 0 3.503v12.471c0 .827.676 1.503 1.503 1.503h20.994c.827 0 1.503-.676 1.503-1.503V3.503C24 2.676 23.324 2 22.497 2H1.503Zm20.671 1.777a.214.214 0 0 1 .21.21V15.13H1.615V3.988a.214.214 0 0 1 .21-.21h20.35Z" clip-rule="evenodd"></path><path fill-rule="evenodd" d="M13.835 20.61v-3.295h-3.67v3.296h3.67Z" clip-rule="evenodd"></path><path fill-rule="evenodd" d="M18.353 21.49c0-.572-.469-1.04-1.041-1.04H6.688c-.572 0-1.04.468-1.04 1.04v1.042h12.705V21.49Z" clip-rule="evenodd"></path></svg>
                    </button>
                  </div>
                </h3>
            </div>
            </div>
            <div class="row" style="background-color:rgb(249 250 251)">
            <div class="col-sm-12" style="border:solid 1px #e5e7eb;">
                <div class="mx-auto w-555" style="height:400px; padding:3%">
                    <div class="font-system custom-box">
                            <div style="padding-right: 1.5rem; padding-left: 1rem;padding-top: 1.25rem;
                            padding-bottom: 1.25rem;">
                                <div class="profile-section">
                                        <div>
                                                <img class="linkedin-profile-pic" src="profile-pic.svg" />
                                        </div>
                                        <div style="flex-basis: 100%; padding-left: 0.4rem; padding-top: 0.4rem;">
                                            <span class="name">Matteo Giardino</span>
                                            <span class="title">Re assoluto | Strategy | Product</span>
                                            <div class="flex items-center gap-1"><span class="text-xs font-normal text-gray-500">Now</span><span class="text-xs font-normal text-gray-500">•</span><svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-4 text-gray-500"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM4.332 8.027a6.012 6.012 0 011.912-2.706C6.512 5.73 6.974 6 7.5 6A1.5 1.5 0 019 7.5V8a2 2 0 004 0 2 2 0 011.523-1.943A5.977 5.977 0 0116 10c0 .34-.028.675-.083 1H15a2 2 0 00-2 2v2.197A5.973 5.973 0 0110 16v-2a2 2 0 00-2-2 2 2 0 01-2-2 2 2 0 00-1.668-1.973z" clip-rule="evenodd"></path></svg></div>
                                        </div> 
                                    </div>
                                    <div class="relative"><div class="overflow-hidden"></div></div>
                                    <div class="padding-reactions">
                                        <div class="flex items-center justify-between">
                                            <div class="flex items-center justify-start gap-2">
                                                <img alt="post reactions"  width="24" height="24"  class="h-5 w-auto" style="color:transparent" src="post-reactions.svg">
                                                <span class="mt-1 text-xs font-medium text-gray-500">Wezard and 88 others</span>
                                            </div>
                                            <div class="flex items-center justify-end gap-2"><span class="text-xs font-medium text-gray-500">4 comments</span><span class="text-xs font-medium text-gray-500">•</span><span class="text-xs font-medium text-gray-500">1 repost</span></div>
                                        </div>
                                    </div>
                                    <hr style="margin-top: 0rem; margin-bottom: 0rem; border: 1px solid rgb(229 231 235); height: 0; border-top-width: 1px;">
                                   
                                    <div style="margin-top: .5rem" class="flex items-center justify-between">
                                        <div class="flex items-center justify-center gap-1.5" style="color:rgb(107 114 128); font-weight: 600; font-size: .875rem;line-height: 1.25rem; padding-top: .5rem; padding-bottom: .5rem; padding-left: .375rem;  padding-right: .375rem;">

                                            <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" viewBox="0 0 26 26" class="size-5"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M22.75 10.563h-4.874v10.562h4.875a.812.812 0 0 0 .812-.813v-8.937a.812.812 0 0 0-.812-.813v0Z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m17.876 10.563-4.063-8.126a3.25 3.25 0 0 0-3.25 3.25v2.438H4.28a1.625 1.625 0 0 0-1.613 1.827l1.22 9.75a1.625 1.625 0 0 0 1.612 1.423h12.378"></path></svg><span>Like</span>
                                        </div>
                                        <div class="flex items-center justify-center gap-1.5" style="color:rgb(107 114 128); font-weight: 600; font-size: .875rem;line-height: 1.25rem; padding-top: .5rem; padding-bottom: .5rem; padding-left: .375rem;  padding-right: .375rem;">

                                            <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" viewBox="0 0 26 26" class="size-5"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.28 17.976a9.746 9.746 0 1 1 3.41 3.41h0l-3.367.962a.813.813 0 0 1-1.005-1.004l.963-3.368h0ZM10.417 11.375h6.5M10.417 14.625h6.5"></path></svg><span>Comment</span>
                                        </div>
                                        <div class="flex items-center justify-center gap-1.5" style="color:rgb(107 114 128); font-weight: 600; font-size: .875rem;line-height: 1.25rem; padding-top: .5rem; padding-bottom: .5rem; padding-left: .375rem;  padding-right: .375rem;">
                                            <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" viewBox="0 0 26 26" class="size-5"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m18.208 15.438 4.875-4.876-4.875-4.874"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.583 20.313a9.75 9.75 0 0 1 9.75-9.75h9.75"></path></svg><span>Share</span>
                                        </div>
                                        <div class="flex items-center justify-center gap-1.5" style="color:rgb(107 114 128); font-weight: 600; font-size: .875rem;line-height: 1.25rem; padding-top: .5rem; padding-bottom: .5rem; padding-left: .375rem;  padding-right: .375rem;">
                                            <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" viewBox="0 0 26 26" class="size-5"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21.354 3.644 2.43 8.98a.812.812 0 0 0-.128 1.517l8.695 4.118c.17.08.306.217.387.387l4.118 8.695a.812.812 0 0 0 1.517-.128l5.337-18.924a.813.813 0 0 0-1.002-1.002ZM11.26 14.74l4.596-4.596"></path></svg><span>Send</span>
                                        </div>
                                    </div>
                                </div>
                            <div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
  </div>
</div>

</body>
<script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
<!-- Initialize Quill editor -->
<script>
    const quill = new Quill('#editor', {
      theme: 'snow'
    });
  </script>
    <script src="style.js"></script>
</html>
