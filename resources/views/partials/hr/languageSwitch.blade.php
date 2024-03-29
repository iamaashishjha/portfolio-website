<style>
	/* Switch starts here */
	.rocker {
		display: inline-block;
		position: relative;
		/*
  SIZE OF SWITCH
  ==============
  All sizes are in em - therefore
  changing the font-size here
  will change the size of the switch.
  See .rocker-small below as example.
  */
		font-size: 2em;
		font-weight: bold;
		text-align: center;
		text-transform: uppercase;
		color: #888;
		width: 7em;
		height: 4em;
		overflow: hidden;
		border-bottom: 0.5em solid #eee;
	}

	.rocker-small {
		font-size: 0.75em;
		/* Sizes the switch */
		margin: 1em;
	}

	.rocker::before {
		content: "";
		position: absolute;
		top: 0.5em;
		left: 0;
		right: 0;
		bottom: 0;
		background-color: #999;
		border: 0.5em solid #eee;
		border-bottom: 0;
	}

	.rocker .languageSwitch {
		opacity: 0;
		width: 0;
		height: 0;
	}

	.switch-left,
	.switch-right {
		cursor: pointer;
		position: absolute;
		display: flex;
		align-items: center;
		justify-content: center;
		height: 2.5em;
		width: 3em;
		transition: 0.2s;
	}

	.switch-left {
		height: 2.4em;
		width: 2.75em;
		left: 0.85em;
		bottom: 0.4em;
		background-color: #ddd;
		transform: rotate(15deg) skewX(15deg);
	}

	.switch-right {
		right: 0.5em;
		bottom: 0;
		background-color: #bd5757;
		color: #fff;
	}

	.switch-left::before,
	.switch-right::before {
		content: "";
		position: absolute;
		width: 0.4em;
		height: 2.45em;
		bottom: -0.45em;
		background-color: #ccc;
		transform: skewY(-65deg);
	}

	.switch-left::before {
		left: -0.4em;
	}

	.switch-right::before {
		right: -0.375em;
		background-color: transparent;
		transform: skewY(65deg);
	}

	.languageSwitch:checked+.switch-left {
		background-color: #0084d0;
		color: #fff;
		bottom: 0px;
		left: 0.5em;
		height: 2.5em;
		width: 3em;
		transform: rotate(0deg) skewX(0deg);
	}

	.languageSwitch:checked+.switch-left::before {
		background-color: transparent;
		width: 3.0833em;
	}

	.languageSwitch:checked+.switch-left+.switch-right {
		background-color: #ddd;
		color: #888;
		bottom: 0.4em;
		right: 0.8em;
		height: 2.4em;
		width: 2.75em;
		transform: rotate(-15deg) skewX(-15deg);
	}

	.languageSwitch:checked+.switch-left+.switch-right::before {
		background-color: #ccc;
	}

	/* Keyboard Users */
	.languageSwitch:focus+.switch-left {
		color: #333;
	}

	.languageSwitch:checked:focus+.switch-left {
		color: #fff;
	}

	.languageSwitch:focus+.switch-left+.switch-right {
		color: #fff;
	}

	.languageSwitch:checked:focus+.switch-left+.switch-right {
		color: #333;
	}
</style>


<div class="mid">
	<form action="{{url('/locale')}}" method="post" id="form">
		@csrf
		<label class="rocker rocker-small">
			<input type="checkbox" name="locale"
			 class="languageSwitch "
			 {{ (App::currentLocale()=='en' ) ? 'checked' : '' }}
			  onchange="$('#form').submit();"
			  >
			<span class="switch-left">EN</span>
			<span class="switch-right">NP</span>
		</label>
	</form>
</div>