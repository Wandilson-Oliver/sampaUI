const SampaUI = {
  version: '0.1.1',
};

if (typeof window !== 'undefined') {
  window.SampaUI = {
    ...(window.SampaUI ?? {}),
    ...SampaUI,
  };
}

export default SampaUI;
