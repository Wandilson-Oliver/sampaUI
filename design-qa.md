# Design QA — Table Search

source visual truth paths:

- `/var/folders/l8/jbx5l3kn7fs51mv596w3dvz00000gn/T/codex-clipboard-4b1d6d2a-b8c7-43d0-a3e6-74c801395a6e.png`
- `/var/folders/l8/jbx5l3kn7fs51mv596w3dvz00000gn/T/codex-clipboard-75d786aa-80fb-407f-9f06-72162f719143.png`
- `/var/folders/l8/jbx5l3kn7fs51mv596w3dvz00000gn/T/codex-clipboard-83d5ca86-c49a-48df-ba89-2eaabd9215e9.png`

implementation screenshot path: unavailable; the in-app browser opened `http://sampaui-documentation.test/examples/advanced-table`, but screenshot and post-reload DOM capture timed out during the final comparison.

viewport: 1280x720

state: light theme, advanced table example, page 2 of 9.

full-view comparison evidence: the latest source screenshot shows the table constrained by the Card `lg` horizontal padding. The rendered HTML now exposes `--sampaui-card-padding-x: 1.5rem` on the Card body and applies an equal negative inline margin plus compensating width to Table Search.

focused region comparison evidence: rendered HTML confirms the table root uses `margin-inline: calc(var(--sampaui-card-padding-x, 0px) * -1)` and `width: calc(100% + (var(--sampaui-card-padding-x, 0px) * 2))`. A post-patch screenshot could not be captured.

## Findings

- [P1] Final visual comparison unavailable
  - Location: Table Search lateral edges inside Card.
  - Evidence: source screenshots are available and the rendered geometry contract is present, but the implementation screenshot could not be captured.
  - Impact: the final pixel-level comparison of both lateral edges cannot be certified.
  - Fix: capture the advanced-table route when the integrated browser screenshot service is available.

## Patches made

- Table Search now compensates the exact horizontal padding published by Card.
- The behavior adapts to Card padding `sm`, `md` and `lg`.
- Standalone tables fall back to zero compensation.
- `bleed="false"` disables the behavior explicitly.
- Unit coverage validates the composed Card + Table Search contract.
- The advanced example uses the official SampaUI Checkbox for select-all and row selection.
- The advanced example demonstrates `pagination-type="numbers"` and keeps `simple` and `compact` available through the component API.

## Required fidelity surfaces

- fonts and typography: unchanged from the SampaUI tokens;
- spacing and layout rhythm: lateral padding compensation implemented and verified in rendered HTML;
- colors and visual tokens: unchanged;
- image quality and asset fidelity: no image assets are used by this component;
- copy and content: unchanged.

final result: blocked
