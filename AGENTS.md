# AGENTS

This file documents guidance for coding agents working in this repository.

## Scope
- Applies to the entire repository unless overridden by a more specific `AGENTS.md` in a subdirectory.

## General Guidelines
- Keep changes focused and minimal.
- Follow existing code style and project conventions.
- Prefer root-cause fixes over surface-level patches.
- Update documentation when behavior changes.
- Do not commit or create branches unless explicitly asked.

## Safety
- Avoid destructive changes outside the requested scope.

## PHP Standards
- All PHP files must include `declare(strict_types=1)`.
- Any newly created PHP function must include a short description that states what it does.
- If a function throws, its description must list the exact throw type(s).
- All return types must be listed as bullet points.
- Syntax must be checked for PHP changes (for example, `php -l`).

## Form Security
- All forms must include a CSRF token.

## JS/CSS Separation
- Do not use inline JavaScript or inline CSS in `.php`/`.html` files.
- JavaScript and CSS must live in separate files and be linked from templates.

## HTML Accessibility Attributes
- Do not use ARIA attributes in HTML.
- Do not use `role` attributes in HTML.

## JavaScript Standards
- All DOM/document queries in JavaScript files must use jQuery selectors and APIs.

## CSS Standards
- Use only `px` units for text sizes (for example, `font-size`).
- For non-text sizing, `%` and viewport-relative units are allowed.
- Do not use `rem`, `em`, `ch`, `cqw`, or `cqh` units.
- Use only hex color values when defining colors.
- Keep colors simple: use direct color values only (no color mixing functions).
- Do not use gradients.
- Do not use animations.
- All colors must come from variables defined in `:root` in `common.css`.
- All fonts must come from variables defined in `:root` in `common.css`.
- All border radius values must come from variables defined in `:root` in `common.css`.
- All shadow values must come from variables defined in `:root` in `common.css`.
- Prefer Flexbox over Grid when possible, as long as visual quality is not compromised.
