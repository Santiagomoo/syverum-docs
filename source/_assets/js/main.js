// Enhance code blocks with language badge and copy button
document.addEventListener('DOMContentLoaded', () => {
  const blocks = document.querySelectorAll('pre > code');

  const labelFromClass = (el) => {
    const cls = Array.from(el.classList).find(c => c.startsWith('language-'));
    return cls ? cls.replace('language-', '').toUpperCase() : 'CODE';
  };

  blocks.forEach(code => {
    const pre = code.parentElement;
    if (pre.dataset.enhanced === '1') return;
    pre.dataset.enhanced = '1';

    // Ensure positioning for overlay UI
    if (!pre.style.position) pre.style.position = 'relative';

    // Language badge
    const badge = document.createElement('div');
    badge.className = 'code-lang-badge';
    badge.textContent = labelFromClass(code);

    // Copy button
    const btn = document.createElement('button');
    btn.type = 'button';
    btn.className = 'copy-btn';
    btn.title = 'Copiar';
    btn.textContent = 'Copiar';

    const copyText = async (text) => {
      try {
        await navigator.clipboard.writeText(text);
      } catch {
        // Fallback for older browsers
        const ta = document.createElement('textarea');
        ta.value = text;
        document.body.appendChild(ta);
        ta.select();
        document.execCommand('copy');
        document.body.removeChild(ta);
      }
    };

    btn.addEventListener('click', async () => {
      const previous = btn.textContent;
      await copyText(code.innerText);
      btn.textContent = '¡Copiado!';
      setTimeout(() => (btn.textContent = previous), 1200);
    });

    pre.appendChild(badge);
    pre.appendChild(btn);
  });
});
