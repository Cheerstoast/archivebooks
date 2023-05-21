<!DOCTYPE html>
<html lang='en'>
<head>
  <meta charset='utf-8'>
  <meta name='viewport' content='width=device-width'>
  <link rel='icon' type='image/x-icon' href='data:image/x-icon;base64,AAABAAEAEBAQAAEABAAoAQAAFgAAACgAAAAQAAAAIAAAAAEABAAAAAAAgAAAAAAAAAAAAAAAEAAAAAAAAAAAAAAA/50zAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAABERAAAAAAARERERAAAAAREREREQAAABERABERAAABERARAREQAAEREBEBERAAAREQEQEREAABERARAREQAAAREQAREQAAABERERERAAAAARERERAAAAAAAREQAAAAAAAAAAAAAAAAAAAAAAAAD//wAA//8AAPw/AADwDwAA4AcAAOGHAADCQwAAwkMAAMJDAADCQwAA4YcAAOAHAADwDwAA/D8AAP//AAD//wAA'>
  <title>archivebooks.repl.co</title>
  <style>
  *,*:before,*:after{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-size: 1rem;
    font-family: Arial;
  }
  body {
    width: 100vw;
    background-image: url('index.svg');
    background-repeat: no-repeat;
    background-position: cover;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
    background-attachment: fixed;
    height: 100%;
  }
  ul {
    margin: auto;
    width: 99%;
    height: 100%;
    padding-inline-start: 0;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
  }
  li {
    display: flex;
    font-size: calc(0.5em + 0.7rem);
    font-family: serif !important;
    background-color: rgba(255,255,255,0.6);
    border: 1px solid rgb(218,220,224);
    border-radius: 3rem;
    padding: 4%;
    margin: 5%;
    white-space: nowrap;
    transition: transform 0.2s ease-in-out;
  }
  li:hover{
    transform: scale(1.04);
  }
  a {
    width: 100%;
    height: 100%;
    color: #2285FF !important;
    text-decoration: none;
    padding: 4% 0.6rem 4%;
    font-family: Monaco, sans-serif;
  }
  a:hover {
    background-color: rgba(0,190,255,0.3);
    color:#0054B0;
  }
  span {
    display: inline-block;
    vertical-align: middle;
    line-height: normal;
    font-size: 0.7rem;
  }
  p {
    padding: 4% 1.6rem 4%;
  }
  #intro{padding:10%;line-height:1.5rem;}
  #what{color:white;background-color:#13BEFF;border:none;border-bottom-right-radius:20%;padding:0.3rem 0.5rem 0.3rem;}
  #what:hover{background-color:#0069DB;}
  </style>
  <script defer>
    function intro(){document.getElementById('intro').style.display = 'block';document.getElementById('what').style.display = 'none';}
  </script>
</head>


<body>
  <button id='what' onclick='intro()'>intro</button>
  
  <div id='intro' style='display:none'>
  <h1>hello. this is my archive of books.</h1>
  <h2>now, you are probably thinking: "oh great, books are just what i need in my life right now! now i just found a pile of books another person has dumped from their bookshelf!"</h2><br>
  <h2>yes, sorry. people do not like books, especially second-handed ones :/</h2>
  
  <h3>but this time, the person giving the books is me.</h3><br>
  <h2>each and every one of these books has something inside them. (unlike 97% of the books at my local library, which contains nothing but <em>air</em>)</h2><br>
  <h2>a small amount of these books, well, let's just say that i enjoyed them a little, but i think others would enjoy it more. not exactly my type. (who spends their attention reading the monstrocity that emerged from some person's imagination? no siree, i speed through those sh¡)</h2><br>

  <h3>well, i don't know why i spent time piecing this together if no one is gonna thank me. maybe it is just the Sunday morning loneliness, or maybe i just wanted to take a look at these books, after many years...</h3><br>

  <h3>anyway. look at every one of these books, please. one of them might just interest you.</h3><br>

  <h1>P.S. source code <a href='https://replit.com/@archivebooks/archivebooks#index.php'>here</a>, or, you know, <a href='https://github.com/Cheerstoast/archivebooks'>here</a></h1><br>

  <h1>P.P.S. complete and updated ebooks are in my calibre library <a href='https://github.com/Cheerstoast/archivebooks'>here</a>, this project will <em>not</em> be maintained actively, while the calibre library would have updates once in a while, and has more metadata... </h1>
  </div>
  <ul>
<?php

// PHP function: str_contains
if (!function_exists('str_contains')){function str_contains($haystack, $needle){return (strpos($haystack, $needle) !== false);}}

// array of shown ebook extensions.
$extensions = array('.mobi','.pdf','.epub','.azw','.azw3','.azw4','.txt');

// array of directories i want to hide.
$hidden = array('.','..','index.php','index.sh','blue.png','.replit','replit.nix','.cache','.git','.gitignore','*');

$directories = scandir('.');
shuffle($directories);
// scan every directory in current directory
foreach ($directories as $directory) {
  // if the directory should be shown and it is a folder then
  if (!in_array($directory,$hidden) && !is_file($directory)) {
    // that means the directory's name is the name of a book
    echo '<li>' . '<p>' . $directory . '</p>';
    // inside the directory there would be different formats of the same book
    $files = scandir($directory);
    // for each file:
    foreach ($files as $file) {
      // if the filename is one of the extensions in the extensions array:
      // show a link to the file
      if (in_array($file,$extensions)) {
        echo '<a download="' . $directory . $file . '" href="' . $directory . '/' . $file . '"><span>' . $file . '</span></a>';
      }
    }
    echo '</li>';
  }
}
// Log directories and their sizes in the console
exec("du -h -x -s -- * | sort -r -h", $output);foreach($output as $line) {echo("<script>console.log('$line');</script>");}
?>
  </ul>
</body>

</html>