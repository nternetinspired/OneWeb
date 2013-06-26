# Oneweb CSS/Scss styleguide

Because I'm a little obsessive about some things…

## CSS Classes, not IDs!

IDs are only used on html elements when it is completely un-avoidable (that's never the case for styling).

### Don't over-specify!

Add only as many selectors as you need to do the job, no more. It's not clever and you only make life harder down the line.

## Tabs to indent code

One tab (equal to 4 spaces) is used to indent / nest markup and Scss

	.example {
		color: #bada55;
		font-family: Baskerville, Georgia, serif;
		font-weight: 300;
		left: 1em;
	}

Scss is also nested with a tab, with child rules spaced, like so:

	figure {
		margin: $gutter 0;

		img {
			display:block;
			margin-bottom: $half-gutter;
		}

		figcaption {
			@extend .muted;
		}
	}

## CSS Class naming conventions

Use hypens only

	.large-class-name == good
	.large_class_name == bad
	.largeClassName   == bad
	.largeclassname   == bad

## CSS Commenting

### Major sections

	/* ==========================================================================
    	LOOK LIKE THIS
	============================================================================= */

Major sections are always preceded by 2 spaces.

### Minor sections

	/* LOOK LIKE THIS */

### CSS comments

	/* Look like this. I'm a comment. Don't sweat it. */
	
and

	/*
	 * Multi-line commments, where verbosity forces the
	 * line to wrap in order to properly contain all the
	 * commenty goodness...
	 * 
	 * Look like this!
	 * /

### Uncompiled Scss comments

	// Are like this. They are stripped on compile.

## CSS rules are sorted alphabetically (that's the intention at least!).

This will aid quick error finding (notice the 2 left declarations).

For Example -

	.example {
		color: #bada55;
		font-family: Baskerville, Georgia, serif;
		font-weight: 300;
		left: 1em;
		left: 1.5em;
	}

### CSS values are always spaced

	display: inline-block;

not

	display:inline-block;

### Brace space

Braces are always spaced from the selector

	.example {
		color: #bada55;
	}

not

	.example{
		color: #bada55;
	}

### Rule closure

Rules are always followed by a semicolon, even the last one!

	.example {
		color: #bada55;
		font-family: Baskerville, Georgia, serif;
		font-weight: 300;
		left: 1em;
	}

not

	.example {
		color: #bada55;
		font-family: Baskerville, Georgia, serif;
		font-weight: 300;
		left: 1em
	}

##Compiling

Comments are very useful for development, but *always* minimise the stylesheet for production.

Seriously, minimise that shit.
