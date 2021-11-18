<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Send Email</title>
	<link rel="stylesheet" href="send/style.css">
	<style>
		frame, #fwha{
			display: none;
		}
	</style>
</head>
<body>
	<div id="form-main">
  <div id="form-div">
    <form class="form" id="form1" action="send/" method="post">
      <div class="sucess">
        Make your spam!
      </div>
      <p class="name">
        <input required name="name" 
        type="text" 
        class="validate[required,custom[onlyLetter],length[0,100]] feedback-input" 
        placeholder="Name" 
        id="name" 
        maxlength="30" />
      </p>
      
      <p class="email">
        <input required name="sender" 
        type="text" 
        class="validate[required,custom[email]] feedback-input" 
        id="email" 
        placeholder="Sender" 
        maxlength="50"/>
      </p>
      <p class="email">
        <input required name="destination" 
        type="text" 
        class="validate[required,custom[email]] feedback-input" 
        id="email2" 
        placeholder="Destination" 
        maxlength="50"/>
      </p>
      <p class="subject">
        <input required name="subject" 
        type="text" 
        class="validate[required,custom[email]] feedback-input" 
        id="subject" 
        placeholder="Subject" 
        maxlength="50"/>
      </p>
      <p class="text">
        <textarea required name="text" class="validate[required,length[6,300]] feedback-input" id="comment" placeholder="Comment" maxlength="500"></textarea>
      </p>
      
      <div class="submit">
        <input type="submit" value="SEND" id="button-blue"/>
        <div class="ease"></div>
      </div>
    </form>
  </div>
</body>
</html>