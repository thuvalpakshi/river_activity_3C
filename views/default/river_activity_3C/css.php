<?php
	/*
	 * 3 Column River Acitivity
	 *
	 * @package ElggRiverDash
	 * Full Creadit goes to ELGG Core Team for creating a beautiful social networking script
	 *
         * Modified by Satheesh PM, BARC, Mumbai, India..
         * http://satheesh.anushaktinagar.net
         *
	 * @author ColdTrick IT Solutions
	 * @copyright Coldtrick IT Solutions 2009
	 * @link http://www.coldtrick.com/
	 * @version 1.0
         *
         */

?>

#site_messages_activity{
text-align : justify;
height:55px;
overflow: hidden;
padding : 5px ;
margin: 0 0 5px 0;
}

#site_messages{
text-align : justify;
height:154px;
overflow: hidden;
padding : 5px ;
margin: 0 0 5px 0;
}

/*
.elgg-river-message{
	border: 1px solid #CCC;
	font-size: 85%;
	line-height: 1.5em;
	margin: 8px 0 5px 0;
	padding: 10px 0px 10px 5px;
        background-color :yellow;
        -moz-border-radius: 8px;
        -webkit-border-radius: 8px;
}
*/

#welcome{
text-align : center;
overflow: hidden;
padding : 5px ;
background-color :white;
margin: 0 0 5px 0;
-moz-border-radius: 6px;
-webkit-border-radius: 6px;
color:blue;
font-weight: bold;
}

#dob{
text-align : center;
overflow: hidden;
padding : 5px ;
background-color :white;
margin: 0 0 5px 0;
-moz-border-radius: 6px;
-webkit-border-radius: 6px;
color:red;
font-weight: bold;
}

#mem{
padding : 5px ;
background-color :white;
margin: 0 0 5px 0;
-moz-border-radius: 8px;
-webkit-border-radius: 8px;
}

#left {
text-align : left;
font-weight: bold;
}

#right {
text-align : right;
}

.black_overlay{
display: none;
position: fixed;
top: 0;
left: 0;
width: 100%;
height: 100%;
background-color: black;
z-index:999998;
-moz-opacity: 0.8;
opacity:.80;
filter: alpha(opacity=80);
}

.popup_content {
display: none;
position: fixed;
width: auto;
height: auto;
top:25%; 
left:25%;
right:25%;
padding: 15px;
background-color: white;
z-index:999999;
overflow: hidden;
text-align : justify;
line-height: 1.5em;
color: #000;
text-shadow:none;
}

.popup_content a{
color: red;
text-decoration:bold;
text-shadow:none;
}

.popup_content a:hover {
color: green;
text-decoration:bold;
text-shadow:none;
}

.border_red {
border: 16px solid red;
}

.border_green {
border: 16px solid green;
}


#horoscope{
text-align : center;
height:148px;
overflow: hidden;
font-weight: bold;
}

#horoscope img{
width : 120px;
height: 120px;
/*border : 1px solid #DEDEDE;*/
padding-bottom : 2px;
}

/* Ads Rotator CSS  */

.eddie {
	float: right;
	padding: 15px 20px 15px 20px;
	}
.jshowoff p.jshowoff-slidelinks {
	position: absolute;
	bottom: 5px;
	right: 5px;
	margin: 0;
	padding: 0;
	}
.jshowoff-slidelinks a, .jshowoff-controls a {
	display: block;
	background-color: #4690D6;
	color: white;
	padding: 5px 7px 5px;
	margin: 5px 0 0 5px;
	float: left;
	text-decoration: none;
	-moz-border-radius: 4px;
	-webkit-border-radius: 4px;
	outline: none;
	font-size: 11px;
	line-height: 14px;
	}
.jshowoff-slidelinks a:hover, .jshowoff-controls a:hover {
	color: red;
	}
.jshowoff-slidelinks a.jshowoff-active, .jshowoff-slidelinks a.jshowoff-active:hover {
	background-color: #fff;
	color: #000;
	}
p.jshowoff-controls {
	overflow: auto;
	height: 1%;
        background : none;
	padding: 0 0 5px 5px;
	margin: 0px;
       	}
.jshowoff-controls a {
	margin: 5px 5px 0 0;
	font-size: 12px;
	padding: 4px 8px 5px;
	}

.jshowoff-pausetext {
	color: blue;
	}



/* Popup */
.elgg-module-popup {
	background-color: white;
	border: 1px solid #ccc;
	
	z-index: 9999;
	margin-bottom: 15px;
	padding: 5px;
	-webkit-border-radius: 6px;
	-moz-border-radius: 6px;
	border-radius: 6px;
	
	-webkit-box-shadow: 4px 4px 4px rgba(0, 0, 0, 0.5);
	-moz-box-shadow: 4px 4px 4px rgba(0, 0, 0, 0.5);
	box-shadow: 4px 4px 4px rgba(0, 0, 0, 0.5);
}
.elgg-module-popup > .elgg-head {
	margin-bottom: 5px;
        border-bottom: 1px solid #ccc;
}
.elgg-module-popup > .elgg-head * {
	color: #0054A7;
}


/* Tab Contents */

	ul.tabs {
		margin:0;
		padding: 0;
		float: left;
		list-style: none;
		height: 42px;
		border-bottom: 1px solid #999999;
		border-left: 1px solid #999999;
		width: 100%;
	}
	ul.tabs li {
		float: left;
		cursor: pointer;
		padding: 5px;
		height:31px;
                line-height:31px;
		border: 1px solid #999999;
		border-left: none;
		font-weight: bold;
		background: #EEEEEE;
		overflow: hidden;
		position: relative;
                
	}
	ul.tabs li:hover {
		background: #CCCCCC;
	}	
	ul.tabs li.active{
		background: #FFFFFF;
		border-bottom: 1px solid #FFFFFF;
	}
        
	ul.tabs li img{
		margin-top: 5px;
                margin-right: 2px;
                float:left;
	}
	.tab_container {
		/*border: 1px solid #999999; */
		/*border-top: none; */
 		clear: both;
		float: left; 
		background: #FFFFFF;
		width: 100%;
		overflow: hidden;
                position: relative;
                
	}
	.tab_content {
		padding-top:20px;
                padding-left:5px;
                padding-right:5px;
		display: none;
		height: auto;

	}