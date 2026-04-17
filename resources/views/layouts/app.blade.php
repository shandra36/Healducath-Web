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
padding:15px 20px;
display:flex;
flex-wrap:wrap;
justify-content:space-between;
align-items:center;
color:white;
gap:10px;
}

.nav-links{
display:flex;
flex-wrap:wrap;
gap:10px;
}

.nav-links a{
text-decoration:none;
color:white;
font-weight:500;
font-size:14px;
}

/* CONTAINER */

.container{
width:90%;
max-width:1200px;
margin:20px auto;
}

/* WELCOME CARD */

.welcome-card{
background:white;
padding:20px;
border-radius:15px;
box-shadow:0 8px 20px rgba(0,0,0,0.08);
margin-bottom:20px;
}

/* GRID */

.dashboard-grid{
display:grid;
grid-template-columns:repeat(auto-fit,minmax(220px,1fr));
gap:15px;
margin-bottom:20px;
}

/* CARD */

.card{
background:white;
padding:20px;
border-radius:15px;
box-shadow:0 8px 20px rgba(0,0,0,0.08);
transition:0.3s;
}

.card:hover{
transform:translateY(-4px);
box-shadow:0 12px 25px rgba(0,0,0,0.1);
}

/* NUMBER */

.stat-number{
font-size:26px;
font-weight:600;
color:#1fa463;
margin-top:8px;
}

/* TASK BOX */

.task-box{
background:white;
padding:20px;
border-radius:15px;
box-shadow:0 8px 20px rgba(0,0,0,0.08);
}

/* BUTTON */

.btn{
background:#1fa463;
color:white;
border:none;
padding:8px 14px;
border-radius:8px;
cursor:pointer;
font-weight:500;
font-size:14px;
}

.btn:hover{
background:#168d53;
}

/* MOBILE ADJUSTMENT */

@media (max-width:768px){

.navbar{
flex-direction:column;
align-items:flex-start;
}

.nav-links{
width:100%;
justify-content:flex-start;
}

.stat-number{
font-size:22px;
}

}

</style>