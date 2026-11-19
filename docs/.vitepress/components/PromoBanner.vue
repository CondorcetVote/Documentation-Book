<template>
  <a
    class="promo"
    href="https://condorcet.vote/?utm_source=condorcet-php-docs&utm_medium=banner&utm_campaign=home"
    target="_blank"
    rel="noopener"
    data-rybbit-event="condorcet_vote_banner_click"
    data-rybbit-prop-location="home"
  >
    <span class="promo-icon" aria-hidden="true">🗳️</span>
    <span class="promo-badge">New</span>
    <span class="promo-text">
      <strong>condorcet.vote</strong> — Condorcet PHP meets an innovative open-source cryptographic protocol.
      <span class="promo-sub">Ring-signature anonymous ballots, results anyone can recount.</span>
    </span>
    <span class="promo-cta">Try it <span class="promo-arrow">→</span></span>
  </a>
</template>

<style scoped>
/* Doubled class selectors to win over .vp-doc a / .vp-doc a:hover */
.promo.promo {
  --promo-accent: #f67255;
  display: flex;
  align-items: center;
  gap: 10px;
  margin: 16px 0;
  padding: 10px 10px 10px 16px;
  border-radius: 12px;
  border: 1px solid color-mix(in srgb, var(--promo-accent) 40%, transparent);
  background:
    linear-gradient(90deg,
      color-mix(in srgb, var(--promo-accent) 14%, var(--vp-c-bg)),
      color-mix(in srgb, var(--vp-c-brand-1) 10%, var(--vp-c-bg)));
  color: var(--vp-c-text-1);
  font-size: 14px;
  font-weight: 400;
  line-height: 1.4;
  text-decoration: none;
  transition: transform .2s ease, box-shadow .2s ease, border-color .2s ease;
}

.promo.promo:hover {
  color: var(--vp-c-text-1);
  transform: translateY(-1px);
  border-color: var(--promo-accent);
  box-shadow: 0 6px 20px color-mix(in srgb, var(--promo-accent) 25%, transparent);
}

.promo-icon { font-size: 18px; }

.promo-badge {
  flex-shrink: 0;
  padding: 1px 8px;
  border-radius: 999px;
  background: var(--promo-accent);
  color: #fff;
  font-size: 11px;
  font-weight: 700;
  letter-spacing: .04em;
  text-transform: uppercase;
}

.promo-text strong { color: var(--promo-accent); }

.promo-sub { color: var(--vp-c-text-2); }

.promo-cta {
  flex-shrink: 0;
  margin-left: auto;
  padding: 4px 12px;
  border-radius: 999px;
  background: var(--vp-c-bg);
  font-weight: 600;
  white-space: nowrap;
}

.promo-arrow {
  display: inline-block;
  transition: transform .2s ease;
}

.promo:hover .promo-arrow { transform: translateX(3px); }

@media (max-width: 639px) {
  .promo.promo {
    flex-wrap: wrap;
    padding: 10px 12px;
  }
  .promo-sub { display: none; }
}
</style>
