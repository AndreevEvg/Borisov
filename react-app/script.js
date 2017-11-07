function formatName(user)
{
    return user.firstName + ' ' + user.lastName;
}

const user = {

    firstName: 'Harper',
    lastName: 'Perez'
}

function getGreeting(user)
{
    if (user) {
	return "Hello " +  formatName(user);
    } 

    return "Hello, Stranger";
}

const element = (

	<h1 className="greeting">{getGreeting(user)}</h1>
);

ReactDOM.render(
    element,
    document.getElementById('root')
);
