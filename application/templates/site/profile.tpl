<!DOCTYPE html>
<html>
{include 'head.tpl'}
<body>
{include 'nav.tpl'}
{capture name=content}
   <div class="" id="profile">

   </div>
   <script src="../cars/media/JavaScript/Profile.js"></script>
   <script>
       new Profile(document.getElementById("profile"));
   </script>
{/capture}
{include 'container.tpl'}
</body>
</html>