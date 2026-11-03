# PSBits | Frontend Variables

Simple definable string placeholders that can be used in any content

## What does it do?

Common use cases include bank account and contact information, strings that are often used in a lot of
different contexts.
The use of frontend variables:
- ensures consistent formatting
- simplifies changes a lot: just change a single value in the backend instead of extensive research, hard
  editorial work or database queries

You can define frontend variables on all pages including root (ID: 0).
Just create a new record on that page (New record -> PSBits | Frontend Variables -> Frontend variable).
Variables are inherited by subpages.
Variables defined on subpages overwrite variables of the same name from parent pages.
If a variable value starts with `TS:` the corresponding TypoScript path will be used as output value.
You can even refer to class constants like `\Your\Namespace\To\Your\Class::CONSTANT_NAME`.
Array constants can be handled, too: `\Your\Namespace\To\Your\Class::CONSTANT_ARRAY['level1']['level2']`.

A backend module (Web -> Frontend variables) lists all available variables on a selected page.

You can use variables in any content, from input and text fields to language labels.
The replacement takes place in `AfterCacheableContentIsGeneratedEvent`.
Since the variables are inserted into the final HTML content, their output value always is of type string!

## Configuration

You can specify the marker syntax in extension settings with which variables can be used (default is curly
braces like `{variable}`).

## Installation

```bash
composer require psbits/frontend-variables
```

## Development

```bash
composer install
composer qa
```

`composer qa` fixes everything that can be fixed automatically and afterwards runs all linters and the static
analysis. The same checks run in the `CI` GitHub Actions workflow, which also runs the test matrix on the
supported core and PHP versions, and in the `pre-commit` hook that is installed by `composer install`.

The workflow publishes the extension to TER when a release tag is pushed. Publishing requires the
`TYPO3_API_TOKEN` repository secret.
