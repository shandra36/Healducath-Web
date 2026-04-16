<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Inter', sans-serif;
}

body{
background:linear-gradient(135deg,#e8f5ec,#cfe9db);
min-height:100vh;
}

/* NAVBAR */

.navbar{
background:#1fa463;
padding:18px 40px;
display:flex;
justify-content:space-between;
align-items:center;
color:white;
box-shadow:0 4px 20px rgba(0,0,0,0.1);
}

.nav-links a{
margin:0 12px;
text-decoration:none;
color:white;
font-weight:500;
}

/* CONTAINER */

.container{
width:90%;
max-width:1200px;
margin:40px auto;
}

/* WELCOME CARD */

.welcome-card{
background:white;
padding:25px;
border-radius:15px;
box-shadow:0 10px 25px rgba(0,0,0,0.08);
margin-bottom:25px;
}

/* GRID */

.dashboard-grid{
display:grid;
grid-template-columns:repeat(3,1fr);
gap:20px;
margin-bottom:25px;
}

/* CARD */

.card{
background:white;
padding:25px;
border-radius:15px;
box-shadow:0 10px 25px rgba(0,0,0,0.08);
transition:0.3s;
}

.card:hover{
transform:translateY(-5px);
box-shadow:0 15px 35px rgba(0,0,0,0.1);
}

/* NUMBER STYLE */

.stat-number{
font-size:32px;
font-weight:600;
color:#1fa463;
margin-top:10px;
}

/* TASK BOX */

.task-box{
background:white;
padding:25px;
border-radius:15px;
box-shadow:0 10px 25px rgba(0,0,0,0.08);
}

/* BUTTON */

.btn{
background:#1fa463;
color:white;
border:none;
padding:10px 18px;
border-radius:8px;
cursor:pointer;
font-weight:500;
}

.btn:hover{
background:#168d53;
}

</style>