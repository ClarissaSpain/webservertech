<%@ Page Language="C#" AutoEventWireup="true" CodeBehind="WebForm1.aspx.cs" Inherits="UMEsports.WebForm1" %>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <title>Montana Esports</title>
</head>
<body>
    <form id="form1" runat="server">
        <div>      
            <div>
            UM Esports
            Registration</div>
    </form>
    <p>
     <asp:Label ID="Label1" runat="server" Text="Label">Gamer Tag</asp:Label> 
        <br /> <input id="Text1" type="text" /></p>
    <p>
        Email <br />
        <input id="Text2" type="text" /></p>
    <p>
        First Name <br /><input id="Text3" type="text" /></p>
    <p>
        Last Name <br /><input id="Text4" type="text" /></p>
    <p>
        Username <br /><input id="Text5" type="text" /></p>
    <p>
        Password <br /><input id="Text6" type="text" /></p>
    <p>
        Confrim Password <br /><input id="Text7" type="text" /></p>
    <p>
        Phone Number <br /><input id="Text8" type="text" /></p>
    <p>
        <input id="Button1" type="button" value="Submit" /></p>
    
    </div>
 
</body>
</html>
