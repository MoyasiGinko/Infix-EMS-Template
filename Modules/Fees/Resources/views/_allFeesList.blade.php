@push('css')
<link rel="stylesheet" href="{{ url('Modules\Fees\Resources\assets\css\feesStyle.css') }}" />
@endpush
@push('css')
<style>
.fees-hero {
  position: relative;
  border-radius: 28px;
  background: linear-gradient(135deg, #312e81, #7c3aed);
  color: #fff;
  padding: 38px 42px;
  overflow: hidden;
  box-shadow: 0 32px 70px rgba(49, 46, 129, 0.32);
}

.fees-hero::after {
  content: '';
  position: absolute;
  inset: 0;
  background: radial-gradient(circle at top right, rgba(255, 255, 255, 0.34), transparent 55%), radial-gradient(circle at bottom left, rgba(14, 165, 233, 0.38), transparent 60%);
  pointer-events: none;
}

.fees-hero .container-fluid {
  position: relative;
  z-index: 2;
}

.fees-hero__top {
  display: flex;
  flex-wrap: wrap;
  align-items: center;
  justify-content: space-between;
  gap: 16px;
}

.fees-hero__top h1 {
  margin: 0;
  font-size: 30px;
  font-weight: 800;
  letter-spacing: 0.02em;
}

.fees-hero .bc-pages {
  display: flex;
  gap: 12px;
  font-weight: 600;
  letter-spacing: 0.05em;
  text-transform: uppercase;
}

.fees-hero .bc-pages a {
  color: rgba(255, 255, 255, 0.85);
  position: relative;
}

.fees-hero .bc-pages a::after {
  content: '';
  position: absolute;
  left: 0;
  bottom: -4px;
  width: 100%;
  height: 2px;
  background: rgba(255, 255, 255, 0.35);
  opacity: 0;
  transition: opacity 0.25s ease;
}

.fees-hero .bc-pages a:hover::after {
  opacity: 1;
}

.fees-hero__body {
  display: flex;
  flex-wrap: wrap;
  align-items: stretch;
  justify-content: space-between;
  gap: 32px;
  margin-top: 28px;
}

.fees-hero__content {
  max-width: 560px;
  display: flex;
  flex-direction: column;
  gap: 12px;
  justify-content: center;
}

.fees-hero__eyebrow {
  font-size: 12px;
  letter-spacing: 0.18em;
  text-transform: uppercase;
  font-weight: 700;
  color: #c7d2fe;
}

.fees-hero__title {
  margin: 0;
  font-size: 30px;
  font-weight: 800;
  color: #fff;
}

.fees-hero__subtitle {
  margin: 0;
  font-size: 16px;
  line-height: 1.6;
  color: rgba(226, 232, 240, 0.85);
}

.fees-hero__actions {
  display: flex;
  flex-direction: column;
  align-items: flex-end;
  justify-content: space-between;
  gap: 16px;
  min-width: 220px;
}

.fees-primary-action {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  gap: 12px;
  padding: 12px 26px;
  border-radius: 16px;
  background: linear-gradient(135deg, #4f46e5, #0ea5e9);
  color: #fff !important;
  font-weight: 800;
  font-size: 14px;
  letter-spacing: 0.12em;
  text-transform: uppercase;
  box-shadow: 0 24px 50px rgba(59, 130, 246, 0.28);
  transition: transform 0.2s ease, box-shadow 0.2s ease;
}

.fees-primary-action:hover,
.fees-primary-action:focus {
  transform: translateY(-2px);
  box-shadow: 0 32px 70px rgba(59, 130, 246, 0.34);
  color: #fff;
  text-decoration: none;
}

.fees-primary-action__icon {
  font-size: 16px;
  display: inline-flex;
  width: 32px;
  height: 32px;
  border-radius: 50%;
  background: rgba(255, 255, 255, 0.18);
  align-items: center;
  justify-content: center;
}

.fees-hero__hint {
  font-size: 12px;
  text-align: right;
  color: rgba(226, 232, 240, 0.82);
  line-height: 1.5;
}

.fees-page-shell {
  background: transparent;
  border: none;
  padding: 0;
  box-shadow: none;
}

.fees-invoice-card__footer {
  display: flex;
  flex-wrap: wrap;
  align-items: center;
  justify-content: space-between;
  gap: 18px;
  padding: 24px 30px 32px;
  background: linear-gradient(135deg, rgba(79, 70, 229, 0.08), rgba(59, 130, 246, 0.08));
  border-top: 1px solid rgba(79, 70, 229, 0.12);
}

.fees-invoice-card__footer-info {
  display: flex;
  flex-direction: column;
  gap: 6px;
  max-width: 520px;
}

.fees-invoice-card__footer-title {
  font-weight: 700;
  font-size: 14px;
  color: #312e81;
  letter-spacing: 0.04em;
}

.fees-invoice-card__footer-subtitle {
  font-size: 13px;
  color: #4338ca;
}

.fees-invoice-card__footer-meta {
  display: inline-flex;
  align-items: center;
  gap: 12px;
  font-weight: 700;
  color: #4338ca;
  text-transform: uppercase;
  letter-spacing: 0.08em;
  font-size: 12px;
}

.fees-invoice-card__footer-meta i {
  font-size: 16px;
}

.cell-date.is-empty .cell-date__main {
  color: #94a3b8;
}

.cell-date.is-empty .cell-date__sub {
  color: #cbd5f5;
}

.fees-invoice-card {
  position: relative;
  border-radius: 18px;
  background: #ffffff;
  box-shadow: 0 24px 60px rgba(15, 23, 42, 0.08);
  overflow: hidden;
}

.fees-invoice-card__header {
  background: linear-gradient(135deg, #4338ca, #5b21b6);
  color: #fff;
  padding: 28px;
  display: flex;
  flex-direction: column;
  gap: 18px;
}

.fees-invoice-card__title h3 {
  margin: 0;
  font-size: 22px;
  font-weight: 700;
  letter-spacing: 0.02em;
}

.fees-invoice-toolbar {
  display: flex;
  flex-wrap: wrap;
  align-items: center;
  justify-content: space-between;
  gap: 16px;
}

.fees-invoice-toolbar__left,
.fees-invoice-toolbar__right {
  display: flex;
  align-items: center;
  gap: 14px;
  flex-wrap: wrap;
}

.fees-invoice-length {
  display: flex;
  align-items: center;
  gap: 12px;
  background: rgba(255, 255, 255, 0.12);
  border-radius: 999px;
  padding: 8px 12px;
  border: 1px solid rgba(255, 255, 255, 0.18);
}

.fees-invoice-length label {
  font-size: 11px;
  text-transform: uppercase;
  letter-spacing: 0.08em;
  margin: 0;
  font-weight: 600;
  opacity: 0.85;
}

#feesInvoiceLength {
  appearance: none;
  -webkit-appearance: none;
  border: none;
  background: transparent;
  color: #fff;
  font-weight: 600;
  font-size: 13px;
  cursor: pointer;
  padding-right: 22px;
}

#feesInvoiceLength option {
  color: #1f2937;
}

.fees-invoice-length::after {
  content: '\25BE';
  font-size: 10px;
  color: #fff;
  opacity: 0.7;
  pointer-events: none;
}

.fees-invoice-search {
  position: relative;
  min-width: 240px;
  flex: 1 1 240px;
}

.fees-invoice-search span {
  position: absolute;
  left: 16px;
  top: 50%;
  transform: translateY(-50%);
  color: rgba(59, 130, 246, 0.9);
  font-size: 14px;
}

.fees-invoice-search input {
  width: 100%;
  border-radius: 999px;
  border: none;
  padding: 10px 18px 10px 42px;
  font-weight: 600;
  background: rgba(255, 255, 255, 0.95);
  color: #1e293b;
  box-shadow: 0 14px 34px rgba(15, 23, 42, 0.18);
  transition: all 0.25s ease;
}

.fees-invoice-search input::placeholder {
  color: rgba(71, 85, 105, 0.7);
}

.fees-invoice-search input:focus {
  outline: none;
  box-shadow: 0 0 0 3px rgba(255, 255, 255, 0.3), 0 14px 36px rgba(15, 23, 42, 0.2);
  background: #fff;
}

.fees-invoice-card__body {
  padding: 28px 28px 34px;
}

.fees-tool-btn {
  border: 1px solid rgba(255, 255, 255, 0.26);
  background: rgba(255, 255, 255, 0.16);
  color: #f8fafc;
  font-weight: 600;
  border-radius: 999px;
  padding: 9px 18px;
  display: inline-flex;
  align-items: center;
  gap: 10px;
  box-shadow: 0 10px 28px rgba(79, 70, 229, 0.24);
  transition: all 0.25s ease;
}

.fees-tool-btn .icon {
  font-size: 16px;
}

.fees-tool-btn:hover,
.fees-tool-btn:focus {
  color: #fff;
  background: rgba(255, 255, 255, 0.32);
  border-color: rgba(255, 255, 255, 0.4);
  text-decoration: none;
}

.fees-tool-dropdown .dropdown-menu {
  min-width: 220px;
  padding: 12px 10px;
  border-radius: 14px;
  border: 1px solid rgba(79, 70, 229, 0.12);
  box-shadow: 0 28px 60px rgba(79, 70, 229, 0.22);
}

.fees-tool-dropdown .dropdown-item {
  border-radius: 10px;
  padding: 10px 12px;
  font-weight: 600;
  font-size: 13px;
  color: #1f2937;
  display: flex;
  align-items: center;
  gap: 10px;
  transition: all 0.2s ease;
}

.fees-tool-dropdown .dropdown-item:hover {
  background: rgba(79, 70, 229, 0.12);
  color: #312e81;
}

.fees-tool-dropdown .dropdown-item .export-icon {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  width: 26px;
  height: 26px;
  border-radius: 8px;
  background: rgba(79, 70, 229, 0.12);
  color: #4f46e5;
  font-size: 14px;
}

.fees-tool-dropdown .dropdown-item .export-icon i,
.fees-tool-dropdown .dropdown-item .export-icon span {
  color: inherit !important;
  font-size: 14px;
}

.fees-column-toggle {
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 10px;
  width: 100%;
  font-size: 13px;
  font-weight: 600;
  color: #1f2937;
}

.fees-column-toggle input {
  width: 20px;
  height: 20px;
  accent-color: #4f46e5;
  cursor: pointer;
}

.fees-column-toggle input:disabled {
  opacity: 0.5;
  cursor: not-allowed;
}

.modern-datatable {
  position: relative;
  border-radius: 16px;
  overflow: hidden;
}

.modern-datatable table.modern-table {
  width: 100%;
  border-collapse: separate;
  border-spacing: 0;
}

.modern-datatable table.modern-table colgroup col[data-name] {
  width: auto;
}

.modern-datatable table.modern-table thead tr th:first-child,
.modern-datatable table.modern-table tbody tr td:first-child {
  border-top-left-radius: 12px;
  border-bottom-left-radius: 12px;
}

.modern-datatable table.modern-table thead tr th:last-child,
.modern-datatable table.modern-table tbody tr td:last-child {
  border-top-right-radius: 12px;
  border-bottom-right-radius: 12px;
}

.modern-datatable table.modern-table thead th {
  border-top: none;
  border-bottom: none;
  background: #f8f7ff;
  padding: 16px 18px;
  font-size: 12px;
  letter-spacing: 0.08em;
  text-transform: uppercase;
  font-weight: 700;
  color: #312e81;
}

.modern-datatable table.modern-table tbody td {
  border-top: 1px solid #e5e7ff;
  padding: 16px 18px;
  font-size: 14px;
  font-weight: 500;
  color: #1e293b;
  background: #fff;
}

.modern-datatable table.modern-table tbody tr:nth-child(even) td {
  background: #f9f9ff;
}

.modern-datatable table.modern-table tbody tr:hover td {
  background: #eef2ff;
}

.modern-datatable table.modern-table tbody tr td .cell-student {
  display: flex;
  flex-direction: column;
  gap: 4px;
}

.modern-datatable .cell-student-cell {
  vertical-align: middle;
}

.modern-datatable .cell-student__name {
  font-weight: 700;
  font-size: 15px;
  color: #1f2937;
}

.modern-datatable .cell-student__meta {
  font-size: 12px;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.06em;
  color: #6366f1;
  display: inline-flex;
  align-items: center;
  gap: 8px;
}

.modern-datatable .cell-roll {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  justify-content: flex-start;
}

.tag-roll {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  font-weight: 700;
  font-size: 13px;
  letter-spacing: 0.08em;
  text-transform: uppercase;
  padding: 6px 12px;
  border-radius: 999px;
  background: rgba(79, 70, 229, 0.12);
  color: #4338ca;
}

.modern-datatable .cell-amount,
.modern-datatable .cell-balance {
  font-variant-numeric: tabular-nums;
  font-weight: 700;
  display: flex;
  align-items: center;
  gap: 8px;
}

.modern-datatable .cell-amount__currency,
.modern-datatable .cell-balance__currency {
  font-size: 11px;
  text-transform: uppercase;
  color: #94a3b8;
}

.modern-datatable .cell-balance.negative {
  color: #b91c1c;
}

.modern-datatable .cell-balance.zero {
  color: #059669;
}

.modern-datatable .cell-balance.credit {
  color: #0f766e;
}

.modern-datatable .tag-status {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  font-size: 12px;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 0.08em;
  border-radius: 999px;
  padding: 6px 14px;
}

.tag-status.paid {
  background: rgba(34, 197, 94, 0.16);
  color: #15803d;
}

.tag-status.partial {
  background: rgba(250, 204, 21, 0.18);
  color: #b45309;
}

.tag-status.unpaid {
  background: rgba(248, 113, 113, 0.18);
  color: #b91c1c;
}

.tag-status i {
  font-size: 14px;
}

.modern-datatable .cell-date {
  display: flex;
  flex-direction: column;
  gap: 4px;
}

.modern-datatable .cell-date__main {
  font-weight: 700;
  color: #1f2937;
}

.modern-datatable .cell-date__sub {
  font-size: 11px;
  text-transform: uppercase;
  letter-spacing: 0.08em;
  color: #9ca3af;
}

.modern-datatable .cell-serial__badge {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  width: 36px;
  height: 36px;
  border-radius: 12px;
  background: rgba(79, 70, 229, 0.12);
  color: #312e81;
  font-weight: 700;
  font-size: 14px;
}

.modern-datatable .cell-actions {
  text-align: right;
}

.modern-datatable .cell-actions .primary-btn {
  border-radius: 10px;
}

.fees-invoice-card.is-loading .modern-datatable::after {
  content: '';
  position: absolute;
  inset: 0;
  background: rgba(248, 250, 255, 0.75);
  backdrop-filter: blur(1.5px);
  z-index: 5;
}

.fees-invoice-card.is-loading .modern-datatable::before {
  content: '';
  position: absolute;
  top: 50%;
  left: 50%;
  width: 44px;
  height: 44px;
  border-radius: 50%;
  border: 4px solid rgba(79, 70, 229, 0.24);
  border-top-color: #4f46e5;
  transform: translate(-50%, -50%);
  animation: feesSpin 0.8s linear infinite;
  z-index: 6;
}

#feesInvoiceRefresh.loading {
  position: relative;
  color: transparent;
}

#feesInvoiceRefresh.loading::after {
  content: '';
  position: absolute;
  top: 50%;
  left: 50%;
  width: 16px;
  height: 16px;
  border-radius: 50%;
  border: 2px solid rgba(255, 255, 255, 0.6);
  border-top-color: #fff;
  transform: translate(-50%, -50%);
  animation: feesSpin 0.7s linear infinite;
}

@keyframes feesSpin {
  from {
    transform: translate(-50%, -50%) rotate(0deg);
  }

  to {
    transform: translate(-50%, -50%) rotate(360deg);
  }
}

/* ========================================
   REDESIGNED - Fees Payment Modal
   Clean, Balanced & Responsive
   ======================================== */

.fees-modal {
  --modal-pad: 20px;
  --modal-gap: 16px;
}

.fees-modal .modal-dialog {
  max-width: 1000px;
  width: 96%;
  margin: 1.5rem auto;
}

.fees-modal__dialog--wide {
  max-width: 1200px;
}

.fees-modal__content {
  border: none;
  border-radius: 12px;
  overflow: hidden;
  box-shadow: 0 20px 40px rgba(0, 0, 0, 0.12);
}

/* ========== HEADER ========== */
.fees-modal__header {
  position: relative;
  background: linear-gradient(135deg, #4338ca, #7c3aed);
  color: #fff;
  padding: var(--modal-pad);
}

.fees-modal__header--danger {
  background: linear-gradient(135deg, #dc2626, #f97316);
}

.fees-modal__header--info {
  background: linear-gradient(135deg, #4f46e5, #7c3aed);
}

.fees-modal__eyebrow {
  display: block;
  font-size: 10px;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.1em;
  opacity: 0.8;
  margin-bottom: 4px;
}

.fees-modal__title {
  font-size: 18px;
  font-weight: 700;
  margin: 0 0 4px 0;
  line-height: 1.3;
}

.fees-modal__subtitle {
  font-size: 14px;
  margin: 0 0 8px 0;
  opacity: 0.9;
  font-weight: 500;
}

.fees-modal__close {
  position: absolute;
  top: 12px;
  right: 12px;
  width: 34px;
  height: 34px;
  padding: 0;
  border: none;
  background: rgba(255, 255, 255, 0.15);
  color: #fff;
  border-radius: 6px;
  cursor: pointer;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 20px;
  line-height: 1;
  transition: all 0.2s;
}

.fees-modal__close:hover {
  background: rgba(255, 255, 255, 0.25);
  color: #fff;
}

/* ========== BODY ========== */
.fees-modal__body {
  padding: var(--modal-pad);
  background: #f8fafc;
  max-height: calc(100vh - 220px);
  overflow-y: auto;
}

.fees-modal__footer {
  padding: var(--modal-pad);
  background: #f8fafc;
  display: flex;
  justify-content: flex-end;
  gap: 10px;
}

/* Modals & Alerts */
.fees-modal__alert {
  display: flex;
  align-items: center;
  gap: 14px;
  padding: 16px;
  border-radius: 8px;
  background: rgba(248, 113, 113, 0.1);
  border: 1px solid rgba(248, 113, 113, 0.2);
  color: #b91c1c;
}

.fees-modal__alert-icon {
  width: 38px;
  height: 38px;
  border-radius: 8px;
  background: rgba(248, 113, 113, 0.15);
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 20px;
  flex-shrink: 0;
}

.fees-modal__alert strong {
  display: block;
  font-size: 14px;
  margin-bottom: 3px;
}

.fees-modal__loader {
  padding: 50px 30px;
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 14px;
  color: #4338ca;
  text-align: center;
}

.fees-modal__spinner {
  width: 48px;
  height: 48px;
  border-radius: 50%;
  border: 3px solid rgba(79, 70, 229, 0.2);
  border-top-color: #4338ca;
  animation: feesSpin 0.8s linear infinite;
}

.fees-modal__error {
  padding: 40px 30px;
  display: flex;
  flex-direction: column;
  gap: 10px;
  color: #b91c1c;
  text-align: center;
}

.fees-modal__error-icon {
  font-size: 32px;
}

.fees-modal__action-btn {
  min-width: 120px;
  border-radius: 8px;
  padding: 10px 20px;
  font-weight: 600;
  font-size: 13px;
  letter-spacing: 0.03em;
}

.fees-modal__action-btn--light {
  background: #fff;
  border: 1px solid #cbd5e1;
  color: #475569;
}

.fees-modal__action-btn--light:hover {
  background: #f8fafc;
  border-color: #94a3b8;
  color: #334155;
}

.fees-modal__action-btn--danger {
  background: linear-gradient(135deg, #dc2626, #f97316);
  color: #fff;
  border: none;
}

.fees-modal__action-btn--danger:hover {
  opacity: 0.9;
  color: #fff;
}

/* ========== LEDGER COMPONENTS ========== */

/* Header Section */
.fees-ledger__header {
  display: flex;
  justify-content: space-between;
  align-items: flex-start;
  gap: 20px;
}

.fees-ledger__header-info {
  flex: 1;
  min-width: 0;
}

/* Meta Information */
.fees-modal__meta {
  display: flex;
  flex-wrap: wrap;
  gap: 8px;
  margin-top: 8px;
  font-size: 12px;
}

.fees-modal__meta span {
  display: inline-flex;
  align-items: center;
  gap: 5px;
  padding: 3px 8px;
  background: rgba(255, 255, 255, 0.15);
  border-radius: 4px;
  white-space: nowrap;
}

.fees-modal__meta i {
  font-size: 11px;
}

/* Status Badge */
.fees-ledger__status {
  display: flex;
  flex-direction: column;
  gap: 4px;
  padding: 14px 16px;
  background: rgba(255, 255, 255, 0.15);
  border-radius: 8px;
  min-width: 240px;
  text-align: right;
  backdrop-filter: blur(10px);
}

.fees-ledger__status-label {
  font-size: 9px;
  text-transform: uppercase;
  letter-spacing: 0.08em;
  opacity: 0.75;
  font-weight: 600;
}

.fees-ledger__status-value {
  font-size: 18px;
  font-weight: 700;
  margin: 2px 0;
}

.fees-ledger__status-meta {
  font-size: 13px;
  opacity: 0.9;
}

.fees-ledger__status-count {
  font-size: 10px;
  opacity: 0.7;
  line-height: 1.4;
  margin-top: 2px;
}

.fees-ledger__status--paid .fees-ledger__status-value {
  color: #10b981;
}

.fees-ledger__status--partial .fees-ledger__status-value {
  color: #f59e0b;
}

.fees-ledger__status--due .fees-ledger__status-value {
  color: #ef4444;
}

/* Section Heading */
.fees-ledger__section-heading {
  display: block;
  font-size: 13px;
  font-weight: 700;
  color: #1e293b;
  text-transform: uppercase;
  letter-spacing: 0.05em;
  margin: 20px 0 12px 0;
  padding-bottom: 6px;
  border-bottom: 2px solid #e2e8f0;
}

.fees-ledger__section-heading:first-child {
  margin-top: 0;
}

/* Summary Cards */
.fees-ledger__summary {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
  gap: 12px;
  margin-bottom: 20px;
}

.fees-ledger__summary-card {
  background: #fff;
  border: 1px solid #e2e8f0;
  border-radius: 8px;
  padding: 14px;
  display: flex;
  flex-direction: column;
  gap: 4px;
  transition: all 0.2s;
}

.fees-ledger__summary-card:hover {
  transform: translateY(-2px);
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.06);
}

.fees-ledger__summary-label {
  font-size: 11px;
  color: #64748b;
  text-transform: uppercase;
  letter-spacing: 0.04em;
  font-weight: 600;
}

.fees-ledger__summary-value {
  font-size: 20px;
  font-weight: 700;
  color: #0f172a;
  display: flex;
  align-items: baseline;
  gap: 3px;
}

.fees-ledger__summary-value span {
  font-size: 14px;
  opacity: 0.7;
}

.fees-ledger__summary-card.balance-negative {
  background: #fef2f2;
  border-color: #fecaca;
}

.fees-ledger__summary-card.balance-negative .fees-ledger__summary-value {
  color: #dc2626;
}

/* ========== TABLE STYLES ========== */

/* Table Caption */
.fees-modal__table-caption {
  display: flex;
  justify-content: space-between;
  align-items: center;
  flex-wrap: wrap;
  gap: 10px;
  font-size: 11px;
  color: #64748b;
  margin-bottom: 12px;
  text-transform: uppercase;
  letter-spacing: 0.05em;
  font-weight: 600;
}

/* Table Container */
.fees-ledger__table {
  background: #fff;
  border-radius: 8px;
  overflow: hidden;
  border: 1px solid #e2e8f0;
  padding: 12px;
}

.fees-ledger__table .table-responsive {
  border-radius: 8px;
  overflow-x: auto;
}

/* Table Base */
.fees-modal-table {
  width: 100%;
  margin: 0;
  border-collapse: collapse;
  font-size: 13px;
}

.fees-modal-table thead {
  background: #f1f5f9;
}

.fees-modal-table thead th {
  padding: 12px 14px;
  font-size: 11px;
  font-weight: 700;
  color: #334155;
  text-transform: uppercase;
  letter-spacing: 0.04em;
  border-bottom: 2px solid #e2e8f0;
  text-align: left;
  white-space: nowrap;
}

.fees-modal-table tbody td {
  padding: 14px;
  border-bottom: 1px solid #f1f5f9;
  color: #475569;
  vertical-align: middle;
}

.fees-modal-table tbody tr:last-child td {
  border-bottom: none;
}

.fees-modal-table tbody tr:hover {
  background-color: #fafbfc;
}

.fees-modal-table tbody td strong {
  color: #0f172a;
  font-weight: 600;
}

/* Tags & Badges */
.fees-modal__tag {
  display: inline-flex;
  align-items: center;
  gap: 5px;
  padding: 4px 10px;
  background: #eef2ff;
  color: #4338ca;
  border-radius: 5px;
  font-size: 11px;
  font-weight: 600;
  border: 1px solid #c7d2fe;
}

.fees-modal__tag i {
  font-size: 11px;
}

/* Table Actions */
.fees-modal__table-actions {
  display: flex;
  gap: 6px;
  align-items: center;
}

.fees-modal__table-actions .primary-btn.icon-only {
  width: 32px;
  height: 32px;
  padding: 0;
  display: flex;
  align-items: center;
  justify-content: center;
  border-radius: 5px;
  font-size: 14px;
}

/* Inline Form */
.fees-modal__inline-form {
  padding: 12px;
  background: #f8fafc;
  border-radius: 6px;
  border: 1px solid #e2e8f0;
}

.fees-modal__inline-form .row {
  margin: 0;
}

.fees-modal__inline-form .col-md-10,
.fees-modal__inline-form .col-md-2 {
  padding: 0 6px;
}

.fees-modal__inline-form .primary_select,
.fees-modal__inline-form .primary_input_field {
  font-size: 12px;
  padding: 8px 10px;
  height: auto;
}

.fees-modal__inline-form .primary-btn.submit {
  height: 34px;
  width: 34px;
  font-size: 14px;
}

.fees-modal__inline-form .primary_input_label {
  font-size: 11px;
  margin-bottom: 4px;
  font-weight: 600;
}

.fees-modal__inline-form .bankInfo {
  margin-top: 12px;
}

/* Empty State */
.fees-modal__empty {
  padding: 30px;
  text-align: center;
  color: #94a3b8;
  font-size: 13px;
  font-style: italic;
}

/* Cell Stack */
.fees-modal__cell-stack {
  display: flex;
  flex-direction: column;
  gap: 4px;
}

/* ========== ENHANCED MODAL CONTENT STYLES ========== */

/* Invoice Badge in Title */
.invoice-badge {
  display: inline-block;
  padding: 4px 10px;
  background: rgba(255, 255, 255, 0.2);
  border-radius: 6px;
  font-size: 14px;
  font-weight: 600;
  margin-right: 8px;
  border: 1px solid rgba(255, 255, 255, 0.3);
}

/* Enhanced Status Badge with Icon */
.status-badge {
  display: flex;
  align-items: center;
  gap: 12px;
  padding-bottom: 10px;
  border-bottom: 1px solid rgba(255, 255, 255, 0.2);
}

.status-icon {
  width: 42px;
  height: 42px;
  border-radius: 8px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 20px;
  background: rgba(255, 255, 255, 0.15);
  flex-shrink: 0;
}

.fees-ledger__status--paid .status-icon {
  background: rgba(16, 185, 129, 0.25);
  color: #10b981;
}

.fees-ledger__status--partial .status-icon {
  background: rgba(245, 158, 11, 0.25);
  color: #f59e0b;
}

.fees-ledger__status--due .status-icon {
  background: rgba(239, 68, 68, 0.25);
  color: #ef4444;
}

.status-content {
  display: flex;
  flex-direction: column;
  gap: 3px;
  flex: 1;
}

.status-label {
  font-size: 11px;
  text-transform: uppercase;
  letter-spacing: 0.08em;
  opacity: 0.8;
  font-weight: 600;
}

.status-value {
  font-size: 20px;
  font-weight: 700;
}

.status-details {
  display: flex;
  flex-direction: column;
  gap: 6px;
}

.status-detail-item {
  display: flex;
  align-items: center;
  gap: 8px;
  font-size: 11px;
  opacity: 0.85;
}

.status-detail-item i {
  font-size: 12px;
  opacity: 0.7;
}

/* Invoice Snapshot Section */
.invoice-snapshot {
  background: #fff;
  border-radius: 10px;
  padding: 18px;
  margin-bottom: 20px;
  border: 1px solid #e2e8f0;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
}

.snapshot-header {
  display: flex;
  align-items: center;
  gap: 12px;
  margin-bottom: 16px;
  padding-bottom: 12px;
  border-bottom: 2px solid #e2e8f0;
}

.snapshot-icon {
  width: 40px;
  height: 40px;
  border-radius: 8px;
  background: linear-gradient(135deg, #6366f1, #8b5cf6);
  color: #fff;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 18px;
  flex-shrink: 0;
}

.snapshot-info {
  flex: 1;
}

.snapshot-title {
  font-size: 15px;
  font-weight: 700;
  color: #0f172a;
  margin: 0 0 2px 0;
}

.snapshot-subtitle {
  font-size: 12px;
  color: #64748b;
  margin: 0;
}

/* Enhanced Summary Cards with Icons */
.card-icon {
  width: 38px;
  height: 38px;
  border-radius: 6px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 16px;
  flex-shrink: 0;
  background: #fff;
}

.fees-ledger__summary-card {
  display: flex;
  align-items: center;
  gap: 12px;
  position: relative;
  overflow: hidden;
}

.fees-ledger__summary-card::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  width: 3px;
  height: 100%;
  background: #cbd5e1;
  transition: width 0.2s;
}

.fees-ledger__summary-card:hover::before {
  width: 5px;
}

.card-content {
  display: flex;
  flex-direction: column;
  gap: 3px;
  flex: 1;
  min-width: 0;
}

.card-primary .card-icon {
  background: linear-gradient(135deg, #6366f1, #8b5cf6);
  color: #fff;
}

.card-primary::before { background: linear-gradient(135deg, #6366f1, #8b5cf6); }

.card-success .card-icon {
  background: linear-gradient(135deg, #10b981, #14b8a6);
  color: #fff;
}

.card-success::before { background: linear-gradient(135deg, #10b981, #14b8a6); }

.card-warning .card-icon {
  background: linear-gradient(135deg, #f59e0b, #f97316);
  color: #fff;
}

.card-warning::before { background: linear-gradient(135deg, #f59e0b, #f97316); }

.card-info .card-icon {
  background: linear-gradient(135deg, #06b6d4, #0ea5e9);
  color: #fff;
}

.card-info::before { background: linear-gradient(135deg, #06b6d4, #0ea5e9); }

.card-balance .card-icon {
  background: linear-gradient(135deg, #64748b, #475569);
  color: #fff;
}

.card-balance::before { background: linear-gradient(135deg, #64748b, #475569); }

.card-balance.balance-negative {
  background: #fef2f2;
  border-color: #fecaca;
}

.card-balance.balance-negative .card-icon {
  background: linear-gradient(135deg, #ef4444, #dc2626);
}

.card-balance.balance-negative::before {
  background: linear-gradient(135deg, #ef4444, #dc2626);
}

.card-balance.balance-negative .fees-ledger__summary-value {
  color: #dc2626;
}

.card-balance.balance-settled {
  background: #f0fdf4;
  border-color: #bbf7d0;
}

.card-balance.balance-settled .card-icon {
  background: linear-gradient(135deg, #10b981, #059669);
}

.card-balance.balance-settled::before {
  background: linear-gradient(135deg, #10b981, #059669);
}

.card-balance.balance-settled .fees-ledger__summary-value {
  color: #059669;
}

/* Payment Ledger Section */
.payment-ledger {
  background: #fff;
  border-radius: 10px;
  padding: 18px;
  border: 1px solid #e2e8f0;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
}

.ledger-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  flex-wrap: wrap;
  gap: 14px;
  margin-bottom: 16px;
  padding-bottom: 14px;
  border-bottom: 2px solid #e2e8f0;
}

.ledger-title-group {
  display: flex;
  align-items: center;
  gap: 12px;
}

.ledger-icon {
  width: 40px;
  height: 40px;
  border-radius: 8px;
  background: linear-gradient(135deg, #8b5cf6, #a78bfa);
  color: #fff;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 18px;
  flex-shrink: 0;
}

.ledger-title {
  font-size: 15px;
  font-weight: 700;
  color: #0f172a;
  margin: 0 0 2px 0;
}

.ledger-subtitle {
  font-size: 12px;
  color: #64748b;
  margin: 0;
}

.ledger-stats {
  display: flex;
  gap: 16px;
}

.stat-item {
  display: flex;
  flex-direction: column;
  align-items: flex-end;
  gap: 2px;
}

.stat-label {
  font-size: 10px;
  color: #94a3b8;
  text-transform: uppercase;
  letter-spacing: 0.05em;
  font-weight: 600;
}

.stat-value {
  font-size: 14px;
  font-weight: 700;
  color: #0f172a;
}

/* Enhanced Table Styles */
.fees-modal-table thead th i {
  margin-right: 5px;
  font-size: 12px;
  opacity: 0.7;
}

.table-badge {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  min-width: 28px;
  height: 28px;
  padding: 0 8px;
  border-radius: 6px;
  font-size: 12px;
  font-weight: 600;
}

.badge-primary {
  background: linear-gradient(135deg, #6366f1, #8b5cf6);
  color: #fff;
}

.table-date {
  display: flex;
  align-items: center;
  gap: 6px;
  color: #475569;
}

.table-date i {
  font-size: 13px;
  color: #94a3b8;
}

.payment-method-badge {
  display: inline-flex;
  align-items: center;
  gap: 6px;
  padding: 5px 12px;
  border-radius: 6px;
  font-size: 11px;
  font-weight: 600;
  border: 1px solid;
}

.payment-method-badge i {
  font-size: 12px;
}

.method-cash {
  background: #fef3c7;
  color: #92400e;
  border-color: #fcd34d;
}

.method-bank {
  background: #dbeafe;
  color: #1e40af;
  border-color: #93c5fd;
}

.method-cheque {
  background: #e0e7ff;
  color: #3730a3;
  border-color: #a5b4fc;
}

.method-wallet {
  background: #d1fae5;
  color: #065f46;
  border-color: #6ee7b7;
}

.table-amount {
  display: flex;
  align-items: center;
  gap: 6px;
  font-size: 13px;
}

.table-amount i {
  font-size: 12px;
}

.amount-paid {
  color: #0f172a;
  font-weight: 600;
}

.amount-paid i {
  color: #10b981;
}

.amount-waiver {
  color: #64748b;
}

.amount-waiver i {
  color: #14b8a6;
}

.amount-fine {
  color: #64748b;
}

.amount-fine i {
  color: #f59e0b;
}

/* Enhanced Action Buttons */
.action-btn {
  width: 32px;
  height: 32px;
  border-radius: 6px;
  display: inline-flex;
  align-items: center;
  justify-content: center;
  font-size: 14px;
  transition: all 0.2s;
  border: 1px solid;
  text-decoration: none;
}

.action-view {
  background: #eff6ff;
  color: #1e40af;
  border-color: #bfdbfe;
}

.action-view:hover {
  background: #dbeafe;
  color: #1e3a8a;
  transform: translateY(-1px);
}

.action-delete {
  background: #fee2e2;
  color: #991b1b;
  border-color: #fecaca;
}

.action-delete:hover {
  background: #fecaca;
  color: #7f1d1d;
  transform: translateY(-1px);
}

/* Enhanced Empty State */
.fees-modal__empty {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 8px;
}

.fees-modal__empty i {
  font-size: 32px;
  color: #cbd5e1;
}

.fees-modal__empty p {
  margin: 0;
  color: #94a3b8;
  font-size: 13px;
}

/* ========== EXPANDABLE CHANGE METHOD STYLES ========== */

/* Change Method Trigger Button */
.change-method-cell {
  display: flex;
  flex-direction: column;
  gap: 6px;
}

/* Change Method Cell Layout */
.change-method-cell {
  display: flex;
  align-items: center;
  flex-wrap: wrap;
  gap: 8px;
}

.change-method-trigger {
  display: inline-flex;
  align-items: center;
  gap: 6px;
  padding: 6px 12px;
  background: linear-gradient(135deg, #f0f9ff, #e0f2fe);
  color: #0369a1;
  border: 1px solid #bae6fd;
  border-radius: 6px;
  font-size: 11px;
  font-weight: 600;
  cursor: pointer;
  transition: all 0.2s;
  white-space: nowrap;
}

.change-method-trigger:hover {
  background: linear-gradient(135deg, #e0f2fe, #bae6fd);
  border-color: #7dd3fc;
  transform: translateY(-1px);
  box-shadow: 0 2px 6px rgba(3, 105, 161, 0.15);
}

.change-method-trigger i {
  font-size: 12px;
}

/* Payment Note Display */
.payment-note-display {
  display: inline-flex;
  align-items: center;
  gap: 6px;
  padding: 6px 10px;
  background: linear-gradient(135deg, #fef3c7, #fde68a);
  border: 1px solid #fbbf24;
  border-radius: 6px;
  font-size: 11px;
  color: #78350f;
  line-height: 1.4;
  margin-left: 8px;
  max-width: 200px;
  font-weight: 600;
  box-shadow: 0 2px 4px rgba(251, 191, 36, 0.15);
}

.payment-note-display i {
  font-size: 12px;
  flex-shrink: 0;
  color: #f59e0b;
}

.payment-note-display span {
  flex: 1;
  word-break: break-word;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}

.payment-note-display:hover span {
  white-space: normal;
  overflow: visible;
}

/* Expandable Row */
.change-method-row {
  background: #fafbfc;
}

.change-method-row td {
  padding: 0 !important;
  border-top: none !important;
}

.change-method-expanded {
  padding: 20px;
  background: #fff;
  border-left: 3px solid #0ea5e9;
  box-shadow: inset 0 2px 8px rgba(0, 0, 0, 0.04);
}

/* Form Header */
.change-method-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 16px;
  padding-bottom: 12px;
  border-bottom: 2px solid #e2e8f0;
}

.header-info {
  display: flex;
  align-items: center;
  gap: 10px;
  color: #0f172a;
  font-weight: 600;
  font-size: 14px;
}

.header-info i {
  width: 32px;
  height: 32px;
  background: linear-gradient(135deg, #0ea5e9, #06b6d4);
  color: #fff;
  border-radius: 6px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 16px;
}

.close-change-method {
  width: 28px;
  height: 28px;
  border: none;
  background: #fee2e2;
  color: #991b1b;
  border-radius: 5px;
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  transition: all 0.2s;
}

.close-change-method:hover {
  background: #fecaca;
  transform: rotate(90deg);
}

/* Form Fields */
.change-method-fields {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  gap: 16px;
  margin-bottom: 16px;
}

.field-group {
  display: flex;
  flex-direction: column;
  gap: 6px;
}

.field-label {
  display: flex;
  align-items: center;
  gap: 6px;
  font-size: 12px;
  font-weight: 600;
  color: #334155;
  margin-bottom: 2px;
}

.field-label i {
  font-size: 13px;
  color: #64748b;
}

.optional-label {
  font-size: 10px;
  font-weight: 400;
  color: #94a3b8;
  margin-left: 4px;
}

.change-method-fields .primary_select,
.change-method-fields .primary_input_field {
  width: 100%;
  padding: 8px 12px;
  border: 1px solid #e2e8f0;
  border-radius: 6px;
  font-size: 13px;
  transition: all 0.2s;
}

.change-method-fields .primary_select:focus,
.change-method-fields .primary_input_field:focus {
  border-color: #0ea5e9;
  outline: none;
  box-shadow: 0 0 0 3px rgba(14, 165, 233, 0.1);
}

.change-method-fields textarea.primary_input_field {
  resize: vertical;
  min-height: 60px;
  line-height: 1.5;
}

/* Form Actions */
.change-method-actions {
  display: flex;
  justify-content: flex-end;
  gap: 10px;
  padding-top: 12px;
  border-top: 1px solid #e2e8f0;
}

.btn-cancel,
.btn-save {
  display: inline-flex;
  align-items: center;
  gap: 6px;
  padding: 8px 16px;
  border-radius: 6px;
  font-size: 13px;
  font-weight: 600;
  cursor: pointer;
  transition: all 0.2s;
  border: none;
}

.btn-cancel {
  background: #f1f5f9;
  color: #475569;
  border: 1px solid #cbd5e1;
}

.btn-cancel:hover {
  background: #e2e8f0;
  border-color: #94a3b8;
}

.btn-save {
  background: linear-gradient(135deg, #0ea5e9, #06b6d4);
  color: #fff;
  box-shadow: 0 2px 6px rgba(14, 165, 233, 0.3);
}

.btn-save:hover {
  background: linear-gradient(135deg, #0284c7, #0891b2);
  box-shadow: 0 4px 10px rgba(14, 165, 233, 0.4);
  transform: translateY(-1px);
}

.btn-save:disabled {
  opacity: 0.6;
  cursor: not-allowed;
  transform: none;
}

/* Bank Info Field Animation */
.field-group.bankInfo {
  animation: slideDown 0.3s ease;
}

@keyframes slideDown {
  from {
    opacity: 0;
    transform: translateY(-10px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

/* ========== RESPONSIVE ========== */

@media (max-width: 991px) {
  .fees-ledger__header {
    flex-direction: column;
  }

  .fees-ledger__status {
    width: 100%;
  }

  .status-badge {
    justify-content: flex-start;
  }

  .fees-ledger__summary {
    grid-template-columns: repeat(2, 1fr);
  }

  .ledger-header {
    flex-direction: column;
    align-items: flex-start;
  }

  .ledger-stats {
    width: 100%;
    justify-content: space-between;
  }

  .stat-item {
    align-items: flex-start;
  }
}

@media (max-width: 767px) {
  .fees-modal .modal-dialog {
    width: 100%;
    margin: 0.5rem;
  }

  .fees-modal__body {
    max-height: calc(100vh - 160px);
  }

  .invoice-snapshot,
  .payment-ledger {
    padding: 14px;
  }

  .snapshot-header,
  .ledger-header {
    flex-direction: column;
    align-items: flex-start;
  }

  .ledger-stats {
    flex-direction: column;
    gap: 8px;
  }

  .fees-modal-table thead {
    display: none;
  }

  .fees-modal-table tbody tr {
    display: block;
    margin-bottom: 12px;
    border: 1px solid #e2e8f0;
    border-radius: 6px;
    background: #fff;
  }

  .fees-modal-table tbody td {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 12px;
    border-bottom: 1px solid #f1f5f9;
  }

  .fees-modal-table tbody td:last-child {
    border-bottom: none;
  }

  .fees-modal-table tbody td::before {
    content: attr(data-label);
    font-weight: 700;
    color: #334155;
    flex: 1;
    margin-right: 10px;
    font-size: 11px;
  }

  .fees-modal__table-actions {
    justify-content: flex-end;
    width: auto;
  }

  .fees-ledger__summary {
    grid-template-columns: 1fr;
  }

  /* Expandable form responsive */
  .change-method-expanded {
    padding: 14px;
  }

  .change-method-header {
    flex-direction: column;
    align-items: flex-start;
    gap: 10px;
  }

  .close-change-method {
    align-self: flex-end;
    margin-top: -8px;
  }

  .change-method-fields {
    grid-template-columns: 1fr;
    gap: 12px;
  }

  .change-method-actions {
    flex-direction: column;
  }

  .btn-cancel,
  .btn-save {
    width: 100%;
    justify-content: center;
  }

  .change-method-trigger {
    font-size: 10px;
    padding: 5px 10px;
  }

  .payment-note-display {
    font-size: 9px;
  }
}

@media (max-width: 576px) {
  .fees-modal__meta span {
    font-size: 10px;
    padding: 2px 6px;
  }

  .fees-ledger__status {
    min-width: 0;
    padding: 12px;
  }
}

/* Scrollbar */
.fees-modal__body::-webkit-scrollbar {
  width: 8px;
}

.fees-modal__body::-webkit-scrollbar-track {
  background: #f1f5f9;
}

.fees-modal__body::-webkit-scrollbar-thumb {
  background: #cbd5e1;
  border-radius: 4px;
}

.fees-modal__body::-webkit-scrollbar-thumb:hover {
  background: #94a3b8;
}
</style>
@endpush
@if (!userPermission('fees.fees-invoice-store'))
@push('css')
<style>
div#table_id_wrapper {
  margin-top: 40px;
}
</style>
@endpush
@endif
@php
$resolvedRole = $role ?? null;
$isStaffView = in_array($resolvedRole, ['admin', 'lms'], true);
$canCreateInvoice = $isStaffView && userPermission('fees.fees-invoice-store');
@endphp
<section class="sms-breadcrumb mb-20 fees-hero">
  <div class="container-fluid p-0">
    <div class="fees-hero__top">
      <h2 class="fees-hero__title">@lang('fees::feesModule.fees_invoice')</h2>
      <nav class="bc-pages" aria-label="breadcrumb">
        <a href="{{ route('dashboard') }}">@lang('common.dashboard')</a>
        <a href="#">@lang('fees.fees')</a>
        <a href="#">@lang('fees::feesModule.fees_invoice')</a>
      </nav>
    </div>
    <div class="fees-hero__body">
      <div class="fees-hero__content">
        <p class="fees-hero__subtitle">
          {{ __('View and manage student fee invoices, payments, and balances.') }}
        </p>
      </div>
      @if ($isStaffView && $canCreateInvoice)
      <div class="fees-hero__actions">
        <a href="{{ route('fees.fees-invoice') }}" class="fees-primary-action">
          <span class="fees-primary-action__icon ti-plus"></span>
          <span class="fees-primary-action__label">@lang('common.add')</span>
        </a>
      </div>
      @endif
    </div>
  </div>
</section>
<section class="admin-visitor-area up_st_admin_visitor">
  <div class="container-fluid p-0">
    <div class="white-box fees-page-shell">
      <div class="row mt-40">

        @if ($isStaffView)
        <div class="col-12">
          <div class="fees-invoice-card">
            <div class="fees-invoice-card__header">

              <div class="fees-invoice-toolbar">
                <div class="fees-invoice-toolbar__left">
                  <div class="fees-invoice-length">
                    <label for="feesInvoiceLength">{{ __('Rows') }}</label>
                    <select id="feesInvoiceLength">
                      <option value="10">10</option>
                      <option value="50">50</option>
                      <option value="100">100</option>
                      <option value="250">250</option>
                      <option value="500">500</option>
                      <option value="10000">All (10k)</option>
                    </select>
                  </div>
                </div>
                <div class="fees-invoice-toolbar__right">
                  <div class="fees-invoice-search">
                    <span class="ti-search"></span>
                    <input type="text" id="feesInvoiceSearch"
                      placeholder="{{ __('Search invoices, students or roll') }}">
                  </div>
                  <div class="dropdown fees-tool-dropdown">
                    <button class="fees-tool-btn dropdown-toggle" type="button" id="feesInvoiceExportToggle"
                      data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <span class="icon ti-download"></span>
                      <span>{{ __('Export') }}</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="feesInvoiceExportToggle"
                      id="feesInvoiceExportMenu">
                      <span class="dropdown-item text-muted small">{{ __('Loading...') }}</span>
                    </div>
                  </div>
                  <div class="dropdown fees-tool-dropdown">
                    <button class="fees-tool-btn dropdown-toggle" type="button" id="feesInvoiceColumnToggle"
                      data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <span class="icon ti-layout"></span>
                      <span>{{ __('Columns') }}</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="feesInvoiceColumnToggle"
                      id="feesInvoiceColumnMenu">
                    </div>
                  </div>
                  <button class="fees-tool-btn" type="button" id="feesInvoiceRefresh">
                    <span class="icon ti-reload"></span>
                    <span>{{ __('Refresh') }}</span>
                  </button>
                </div>
              </div>
            </div>
            <div class="fees-invoice-card__body">
              <x-table>
                <div class="modern-datatable table-responsive">
                  <table id="table_id" class="table data-table modern-table" cellspacing="0" width="100%">
                    <colgroup>
                      <col data-name="serial" style="width:60px;">
                      <col data-name="student" style="width:210px;">
                      <col data-name="roll" style="width:140px;">
                      <col data-name="amount" style="width:120px;">
                      <col data-name="weaver" style="width:120px;">
                      <col data-name="fine" style="width:120px;">
                      <col data-name="paid" style="width:120px;">
                      <col data-name="balance" style="width:140px;">
                      <col data-name="status" style="width:120px;">
                      <col data-name="paid_date" style="width:150px;">
                      <col data-name="date" style="width:140px;">
                      <col data-name="action" style="width:110px;">
                    </colgroup>
                    <thead>
                      <tr>
                        <th>@lang('common.sl')</th>
                        <th>@lang('common.student')</th>
                        <th>@lang('student.roll_no')</th>
                        <th>@lang('accounts.amount')</th>
                        <th>@lang('fees::feesModule.waiver')</th>
                        <th>@lang('fees.fine')</th>
                        <th>@lang('fees.paid')</th>
                        <th>@lang('accounts.balance')</th>
                        <th>@lang('common.status')</th>
                        <th>@lang('fees.payment_date')</th>
                        <th>@lang('common.date')</th>
                        <th>@lang('common.action')</th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                </div>
              </x-table>
            </div>

          </div>
        </div>
        @else
        <div class="col-lg-12 student-details up_admin_visitor mt-0">
          <ul class="nav nav-tabs tabs_scroll_nav mt-0 ml-0" role="tablist">
            @foreach ($records as $key => $record)
            <li class="nav-item mb-0">
              <a class="nav-link mb-0 @if ($key == 0) active @endif " href="#tab{{ $key }}" role="tab"
                data-toggle="tab">{{ moduleStatusCheck('University') ? $record->unSemesterLabel->name : $record->class->class_name }}
                ({{ $record->section->section_name }}) @if(shiftEnable())
                @if($record->shift)[{{@$record->shift->shift_name}}]@endif @endif
              </a>
            </li>
            @endforeach
          </ul>

          <div class="tab-content" style="margin-top:70px">
            @foreach ($records as $key => $record)
            <div role="tabpanel" class="tab-pane fade  @if ($key == 0) active show @endif" id="tab{{ $key }}">
              <x-table>
                <table id="table_id" class="table" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th>@lang('common.sl')</th>
                      <th>@lang('common.student')</th>
                      <th>@if(shiftEnable()) @lang('admin.class_Sec_shift') @else @lang('student.class_section') @endif
                      </th>
                      <th>@lang('accounts.amount')</th>
                      <th>@lang('fees::feesModule.waiver')</th>
                      <th>@lang('fees.fine')</th>
                      <th>@lang('fees.paid')</th>
                      <th>@lang('accounts.balance')</th>
                      <th>@lang('common.status')</th>
                      <th>@lang('common.date')</th>
                      <th>@lang('common.action')</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($record->feesInvoice as $key => $studentInvoice)
                    @php
                    $amount = $studentInvoice->Tamount;
                    $weaver = $studentInvoice->Tweaver;
                    $fine = $studentInvoice->Tfine;
                    $paid_amount = $studentInvoice->Tpaidamount;
                    $sub_total = $studentInvoice->Tsubtotal;
                    $balance = $amount + $fine - ($paid_amount + $weaver);
                    @endphp
                    <tr>
                      <td>{{ $key + 1 }}</td>
                      <td>
                        <a href="{{ route('fees.fees-invoice-view', ['id' => $studentInvoice->id, 'state' => 'view']) }}"
                          target="_blank">
                          {{ @$studentInvoice->studentInfo->full_name }}
                        </a>
                      </td>
                      <td>{{ @$studentInvoice->recordDetail->class->class_name }}
                        ({{ @$studentInvoice->recordDetail->section->section_name }})
                        @if(shiftEnable())[{{ '(' . @$studentInvoice->recordDetail->shift != '' ? @$studentInvoice->recordDetail->shift->name : '' . ')' }}]@endif
                      </td>
                      <td>{{ $amount }}</td>
                      <td>{{ $weaver }}</td>
                      <td>{{ $fine }}</td>
                      <td>{{ $paid_amount }}</td>
                      <td>{{ $balance }}</td>
                      <td>
                        @if ($balance == 0)
                        <button class="primary-btn small bg-success text-white border-0">@lang('fees.paid')</button>
                        @elseif ($paid_amount > 0)
                        <button class="primary-btn small bg-warning text-white border-0">@lang('fees.partial')</button>
                        @else
                        <button class="primary-btn small bg-danger text-white border-0">@lang('fees.unpaid')</button>
                        @endif
                      </td>
                      <td>{{ dateConvert($studentInvoice->create_date) }}</td>
                      <td>
                        <x-drop-down>
                          <a class="dropdown-item"
                            href="{{ route('fees.fees-invoice-view', ['id' => $studentInvoice->id, 'state' => 'view']) }}">@lang('common.view')</a>
                          @if ($balance != 0)
                          <a class="dropdown-item"
                            href="{{ route('fees.student-fees-payment', $studentInvoice->id) }}">@lang('inventory.add_payment')</a>
                          @endif
                        </x-drop-down>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </x-table>
            </div>
            @endforeach
          </div>
        </div>
        @endif
      </div>
    </div>
  </div>
</section>

{{-- Delete Modal Start --}}
<div class="modal fade fees-modal admin-query" id="deleteFeesPayment" tabindex="-1" role="dialog"
  aria-labelledby="deleteFeesPaymentLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered fees-modal__dialog" role="document">
    <div class="modal-content fees-modal__content">
      <div class="fees-modal__header fees-modal__header--danger">
        <div>
          <span class="fees-modal__eyebrow">@lang('common.confirmation')</span>
          <h4 class="fees-modal__title" id="deleteFeesPaymentLabel">@lang('fees::feesModule.delete_fees_invoice')</h4>
          <p class="fees-modal__subtitle">
            {{ __('Deleting this invoice will remove all approved payment records associated with it.') }}</p>
        </div>
        <button type="button" class="fees-modal__close" data-dismiss="modal" aria-label="@lang('common.close')">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="fees-modal__body">
        <div class="fees-modal__alert">
          <span class="fees-modal__alert-icon ti-alert" aria-hidden="true"></span>
          <div>
            <strong>@lang('common.are_you_sure_to_delete')</strong>
            <span>{{ __('This action cannot be undone.') }}</span>
          </div>
        </div>
      </div>
      {{ html()->form('POST', route('fees.fees-invoice-delete'))->open() }}
      <input type="hidden" name="feesInvoiceId" value="">
      <div class="fees-modal__footer">
        <button type="button" class="fees-modal__action-btn fees-modal__action-btn--light" data-dismiss="modal">
          @lang('common.cancel')</button>
        <button class="fees-modal__action-btn fees-modal__action-btn--danger" type="submit">
          @lang('common.delete')</button>
      </div>
      {{ html()->form()->close() }}
    </div>
  </div>
</div>
{{-- Delete Modal End --}}

{{-- View Fees Modal Start --}}
<div class="modal fade fees-modal admin-query" id="viewFeesPayment" tabindex="-1" role="dialog"
  aria-labelledby="viewFeesPaymentLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered fees-modal__dialog fees-modal__dialog--wide" role="document">
    <div class="modal-content fees-modal__content">
      <div class="fees-modal__loader">
        <span class="fees-modal__spinner" aria-hidden="true"></span>
        <div>
          <strong>{{ __('Loading payment details...') }}</strong>
          <p class="mb-0">{{ __('Please wait while we prepare the ledger view.') }}</p>
        </div>
      </div>
    </div>
  </div>
</div>
{{-- View Fees Modal End --}}

@include('backEnd.partials.data_table_js_fees_list')
@include('backEnd.partials.server_side_datatable')
<script>
function feesInvoiceDelete(id) {
  var modal = $('#deleteFeesPayment');
  modal.find('input[name=feesInvoiceId]').val(id)
  modal.modal('show');
}

function viewPaymentDetailModal(id) {
  const $modal = $('#viewFeesPayment');
  const $content = $modal.find('.modal-content');
  const loaderMarkup = `
    <div class="fees-modal__loader">
      <span class="fees-modal__spinner" aria-hidden="true"></span>
      <div>
        <strong>{{ __('Loading payment details...') }}</strong>
        <p class="mb-0">{{ __('Please wait while we prepare the ledger view.') }}</p>
      </div>
    </div>`;
  const errorMarkup = `
    <div class="fees-modal__error">
      <span class="fees-modal__error-icon ti-alert" aria-hidden="true"></span>
      <strong>{{ __('We could not load the payment information.') }}</strong>
      <span>{{ __('Refresh the page and try again, or contact the administrator if the issue persists.') }}</span>
    </div>`;

  $modal.modal('show');
  const invoiceId = id;
  $.ajax({
    url: "{{ route('fees.fees-view-payment') }}",
    method: "POST",
    data: {
      invoiceId: invoiceId
    },
    beforeSend: function() {
      $content.html(loaderMarkup);
    },
    success: function(response) {
      $content.html(response);
    },
    error: function() {
      $content.html(errorMarkup);
    }
  });
}
$(document).ready(function() {
  const $dataTable = $('.data-table');
  if (!$dataTable.length) {
    return;
  }

  const lengthKey = 'feesInvoice_pageLength';
  const validLengths = [10, 50, 100, 250, 500, 10000];
  const maxLen = 10000;
  const urlParams = new URLSearchParams(window.location.search);
  let urlLen = parseInt(urlParams.get('show_entries'), 10);
  if (urlLen === -1) {
    urlLen = maxLen;
  }
  if (!validLengths.includes(urlLen)) {
    urlLen = null;
  }

  let savedLength = parseInt(localStorage.getItem(lengthKey) || '10', 10);
  if (savedLength === -1) {
    savedLength = maxLen;
  }
  if (!validLengths.includes(savedLength)) {
    savedLength = 10;
  }

  const initialLength = urlLen !== null ? urlLen : savedLength;

  const $card = $('.fees-invoice-card');
  const $lengthSelect = $('#feesInvoiceLength');
  const $searchInput = $('#feesInvoiceSearch');
  const $refreshBtn = $('#feesInvoiceRefresh');
  const $columnMenu = $('#feesInvoiceColumnMenu');
  const $exportMenu = $('#feesInvoiceExportMenu');

  if ($lengthSelect.length && !isNaN(initialLength)) {
    $lengthSelect.val(String(initialLength));
  }

  const noExportsMessage =
    "<span class=\"dropdown-item text-muted small\">{{ __('No export actions available') }}</span>";
  const noColumnsMessage = "<span class=\"dropdown-item text-muted small\">{{ __('No columns available') }}</span>";

  const currencySymbol = "{{ e(generalSetting()->currency_symbol ?? '') }}";
  const currencySymbolHtml = $('<div/>').text(currencySymbol || '').html();
  const locale = navigator.language || 'en-US';
  const numberFormatter = typeof Intl !== 'undefined' ? new Intl.NumberFormat(locale, {
    minimumFractionDigits: 2,
    maximumFractionDigits: 2,
  }) : null;
  const rollLabel = "{{ __('student.roll_no') }}";
  const createdLabel = "{{ __('Created') }}";
  const paidLabel = "{{ __('fees.payment_date') }}";
  const statusLabels = {
    paid: "{{ __('fees.paid') }}",
    partial: "{{ __('fees.partial') }}",
    unpaid: "{{ __('fees.unpaid') }}",
  };

  const sanitizeHtml = (value) => $('<div/>').text(value ?? '').html();
  const parseNumber = (value) => {
    if (value === null || value === undefined || value === '') {
      return null;
    }
    const num = parseFloat(String(value).replace(/,/g, ''));
    return Number.isFinite(num) ? num : null;
  };
  const formatNumber = (value) => {
    const num = parseNumber(value);
    if (num === null) {
      return '--';
    }
    if (!numberFormatter) {
      return num.toFixed(2);
    }
    return numberFormatter.format(num);
  };
  const buildAmountHtml = (value) => {
    const formatted = formatNumber(value);
    return `<span class="cell-amount__currency">${currencySymbolHtml}</span><span>${formatted}</span>`;
  };

  const statusIconMap = {
    paid: 'ti-check',
    partial: 'ti-timer',
    unpaid: 'ti-alert',
  };

  const dt = $dataTable.DataTable({
    processing: true,
    serverSide: true,
    ajax: $.fn.dataTable.pipeline({
      url: "{{ url('fees/fees-invoice-datatable') }}",
      data: {},
      pages: "{{ generalSetting()->ss_page_load }}"
    }),
    columns: [{
        data: 'DT_RowIndex',
        name: 'id'
      },
      {
        data: 'student_name',
        name: 'student_name',
        orderable: false,
        searchable: true
      },
      {
        data: 'roll_no',
        name: 'roll_no',
        orderable: false,
        searchable: true
      },
      {
        data: 'amount',
        name: 'amount',
        orderable: false,
        searchable: false
      },
      {
        data: 'weaver',
        name: 'weaver',
        orderable: false,
        searchable: false
      },
      {
        data: 'fine',
        name: 'fine',
        orderable: false,
        searchable: false
      },
      {
        data: 'paid_amount',
        name: 'paid_amount',
        orderable: false,
        searchable: false
      },
      {
        data: 'balance',
        name: 'balance',
        orderable: false,
        searchable: false
      },
      {
        data: 'status',
        name: 'status',
        orderable: false,
        searchable: false
      },
      {
        data: 'paid_date',
        name: 'paid_date',
        orderable: false,
        searchable: false
      },
      {
        data: 'create_date',
        name: 'create_date',
        orderable: true,
        searchable: false
      },
      {
        data: 'action',
        name: 'action',
        orderable: false,
        searchable: false
      },
    ],
    bLengthChange: false,
    lengthMenu: [
      [10, 50, 100, 250, 500, 10000],
      [10, 50, 100, 250, 500, '10000']
    ],
    pageLength: initialLength,
    bDestroy: true,
    language: {
      processing: "<span class='sr-only'>{{ __('Processing') }}</span>",
      paginate: {
        next: "<i class='ti-arrow-right'></i>",
        previous: "<i class='ti-arrow-left'></i>",
      },
      emptyTable: "{{ __('No data available in table') }}",
      zeroRecords: "{{ __('No matching records found') }}"
    },
    dom: "Brtip",
    buttons: [{
        extend: "copyHtml5",
        text: '<i class="fa fa-files-o"></i>',
        title: $("#logo_title").val(),
        titleAttr: window.jsLang('copy_table'),
        exportOptions: {
          columns: ':visible:not(.not-export-col)'
        },
      },
      {
        extend: "excelHtml5",
        text: '<i class="fa fa-file-excel-o"></i>',
        titleAttr: window.jsLang('export_to_excel'),
        title: $("#logo_title").val(),
        margin: [10, 10, 10, 0],
        exportOptions: {
          columns: ':visible:not(.not-export-col)'
        },
      },
      {
        extend: "csvHtml5",
        text: '<i class="fa fa-file-text-o"></i>',
        titleAttr: window.jsLang('export_to_csv'),
        exportOptions: {
          columns: ':visible:not(.not-export-col)'
        },
      },
      {
        extend: "pdfHtml5",
        text: '<i class="fa fa-file-pdf-o"></i>',
        title: $("#logo_title").val(),
        titleAttr: window.jsLang('export_to_pdf'),
        exportOptions: {
          columns: ':visible:not(.not-export-col)'
        },
        orientation: "landscape",
        pageSize: "A4",
        margin: [0, 0, 0, 12],
        alignment: "center",
        header: true,
        customize: function(doc) {
          doc.content[1].margin = [100, 0, 100, 0];
          doc.content.splice(1, 0, {
            margin: [0, 0, 0, 12],
            alignment: "center",
            image: "data:image/png;base64," + $("#logo_img").val(),
          });
          doc.defaultStyle = {
            font: 'DejaVuSans'
          }
        },
      },
      {
        extend: "print",
        text: '<i class="fa fa-print"></i>',
        titleAttr: window.jsLang('print'),
        title: $("#logo_title").val(),
        exportOptions: {
          columns: ':visible:not(.not-export-col)'
        },
      },
      {
        extend: "colvis",
        text: '<i class="fa fa-columns"></i>',
        postfixButtons: ["colvisRestore"],
      },
    ],
    columnDefs: [{
      visible: false,
    }],
    responsive: true,
    drawCallback: function(settings) {
      const api = this.api();
      const currentLength = api.page.len();
      localStorage.setItem(lengthKey, currentLength);
      const params = new URLSearchParams(window.location.search);
      if (currentLength === 10) {
        params.delete('show_entries');
      } else {
        params.set('show_entries', currentLength);
      }
      const queryString = params.toString();
      const newUrl = window.location.pathname + (queryString ? '?' + queryString : '');
      window.history.replaceState({}, '', newUrl);
      if ($lengthSelect.length) {
        $lengthSelect.val(String(currentLength));
      }
    },
    rowCallback: function(row, data) {
      const $cells = $('td', row);
      if (!$cells.length) {
        return;
      }

      const serialCell = $cells.eq(0);
      const serialValue = sanitizeHtml(data.DT_RowIndex);
      serialCell.html(`<span class="cell-serial__badge">${serialValue}</span>`);

      const studentCell = $cells.eq(1);
      studentCell.addClass('cell-student-cell');
      const studentWrapper = $('<div/>').html(data.student_name || '');
      const studentLinkHtml = studentWrapper.html() || '--';
      const studentMeta = data.roll_no ?
        `<span class="cell-student__meta">${rollLabel}: ${sanitizeHtml(data.roll_no)}</span>` : '';
      studentCell.html(
        `<div class="cell-student"><span class="cell-student__name">${studentLinkHtml}</span>${studentMeta}</div>`
      );

      const rollCell = $cells.eq(2);
      const rollValue = data.roll_no ? `#${sanitizeHtml(data.roll_no)}` : '--';
      rollCell.html(`<span class="cell-roll"><span class="tag-roll">${rollValue}</span></span>`);

      const amountCell = $cells.eq(3);
      amountCell.html(`<div class="cell-amount">${buildAmountHtml(data.amount)}</div>`);

      const weaverCell = $cells.eq(4);
      weaverCell.html(`<div class="cell-amount">${buildAmountHtml(data.weaver)}</div>`);

      const fineCell = $cells.eq(5);
      fineCell.html(`<div class="cell-amount">${buildAmountHtml(data.fine)}</div>`);

      const paidCell = $cells.eq(6);
      paidCell.html(`<div class="cell-amount">${buildAmountHtml(data.paid_amount)}</div>`);

      const balanceCell = $cells.eq(7);
      const balanceNum = parseNumber(data.balance);
      let balanceState = '';
      if (balanceNum !== null) {
        if (balanceNum <= 0) {
          balanceState = ' zero';
        } else {
          balanceState = ' negative';
        }
        if (balanceNum < 0) {
          balanceState = ' credit';
        }
      }
      balanceCell.html(`<div class="cell-balance${balanceState}">${buildAmountHtml(data.balance)}</div>`);

      const statusCell = $cells.eq(8);
      const paidAmountNum = parseNumber(data.paid_amount);
      let statusVariant = 'unpaid';
      if (balanceNum !== null) {
        if (balanceNum <= 0) {
          statusVariant = 'paid';
        } else if (paidAmountNum && paidAmountNum > 0) {
          statusVariant = 'partial';
        }
      }
      const statusLabel = statusLabels[statusVariant] || statusVariant;
      const statusIcon = statusIconMap[statusVariant] || 'ti-alert';
      statusCell.html(
        `<span class="tag-status ${statusVariant}"><i class="${statusIcon}"></i>${statusLabel}</span>`);

      const paidDateCell = $cells.eq(9);
      const paidDateValue = sanitizeHtml(data.paid_date || '');
      if (paidDateValue) {
        paidDateCell.html(
          `<div class="cell-date"><span class="cell-date__main">${paidDateValue}</span><span class="cell-date__sub">${paidLabel}</span></div>`
        );
      } else {
        paidDateCell.html(
          `<div class="cell-date is-empty"><span class="cell-date__main">--</span><span class="cell-date__sub">${paidLabel}</span></div>`
        );
      }

      const dateCell = $cells.eq(10);
      const dateValue = sanitizeHtml(data.create_date || '--');
      dateCell.html(
        `<div class="cell-date"><span class="cell-date__main">${dateValue}</span><span class="cell-date__sub">${createdLabel}</span></div>`
      );

      const actionCell = $cells.eq(11);
      actionCell.addClass('cell-actions');
    },
  });

  dt.on('preXhr.dt', function(e, settings, data) {
    if (data.length > maxLen) {
      data.start = 0;
      data.length = maxLen;
    }
  });

  if (urlLen && urlLen !== dt.page.len()) {
    dt.page.len(urlLen).draw(false);
  }

  if ($lengthSelect.length) {
    $lengthSelect.on('change', function() {
      const newLength = parseInt($(this).val(), 10);
      if (!isNaN(newLength) && validLengths.includes(newLength)) {
        dt.page.len(newLength).draw();
      }
    });
  }

  if ($searchInput.length) {
    let searchTimer = null;
    $searchInput.on('input', function() {
      const value = this.value;
      clearTimeout(searchTimer);
      searchTimer = setTimeout(function() {
        dt.search(value).draw();
      }, 250);
    });

    $searchInput.on('keydown', function(e) {
      if (e.key === 'Escape') {
        $(this).val('');
        dt.search('').draw();
      }
    });
  }

  if ($refreshBtn.length) {
    $refreshBtn.on('click', function() {
      const $btn = $(this);
      if ($btn.hasClass('loading')) {
        return;
      }
      $btn.addClass('loading');
      if (typeof dt.clearPipeline === 'function') {
        dt.clearPipeline();
      }
      dt.ajax.reload(function() {
        $btn.removeClass('loading');
      }, false);
      setTimeout(function() {
        $btn.removeClass('loading');
      }, 1200);
    });
  }

  dt.on('xhr.dt', function() {
    $refreshBtn.removeClass('loading');
  });

  dt.on('processing.dt', function(e, settings, processing) {
    if ($card.length) {
      $card.toggleClass('is-loading', processing);
    }
  });

  function rebuildExportMenu() {
    if (!$exportMenu.length) {
      return;
    }
    const $dtButtons = $('#table_id_wrapper .dt-buttons');
    $exportMenu.empty();
    if (!$dtButtons.length) {
      $exportMenu.append(noExportsMessage);
      return;
    }
    $dtButtons.find('a, button').each(function() {
      const $original = $(this);
      const $item = $('<button type="button" class="dropdown-item d-flex align-items-center"></button>');
      const $iconHolder = $('<span class="export-icon mr-2"></span>');
      $iconHolder.html($original.html());
      const label = $original.attr('title') || $original.data('title') || $original.text().trim() ||
        "{{ __('Export') }}";
      const $labelSpan = $('<span class="font-weight-semibold"></span>').text(label);
      $item.append($iconHolder).append($labelSpan);
      $item.on('click', function() {
        $original.trigger('click');
      });
      $exportMenu.append($item);
    });
    if (!$exportMenu.children().length) {
      $exportMenu.append(noExportsMessage);
    }
    $dtButtons.hide();
  }

  function buildColumnMenu() {
    if (!$columnMenu.length) {
      return;
    }
    $columnMenu.empty();
    dt.columns().every(function(index) {
      const column = this;
      const headerText = $(column.header()).text().trim();
      if (!headerText) {
        return;
      }
      const columnId = `fees-column-${index}`;
      const locked = index === 0;
      const checked = column.visible();
      const disabledAttr = locked ? 'disabled' : '';
      const checkedAttr = checked ? 'checked' : '';
      const template = `
        <label class="dropdown-item fees-column-toggle" for="${columnId}">
          <span>${headerText}</span>
          <input type="checkbox" id="${columnId}" data-column="${index}" ${checkedAttr} ${disabledAttr}>
        </label>
      `;
      $columnMenu.append(template);
    });
    if (!$columnMenu.children().length) {
      $columnMenu.append(noColumnsMessage);
    }
  }

  dt.on('init.dt', function() {
    rebuildExportMenu();
    buildColumnMenu();
    if ($searchInput.length) {
      $searchInput.val(dt.search());
    }
  });

  dt.on('column-visibility.dt', function(e, settings, column, state) {
    const $input = $columnMenu.find(`input[data-column="${column}"]`);
    if ($input.length && !$input.prop('disabled')) {
      $input.prop('checked', state);
    }
  });

  if ($columnMenu.length) {
    $columnMenu.on('change', 'input[data-column]', function() {
      const columnIndex = parseInt($(this).data('column'), 10);
      if (isNaN(columnIndex)) {
        return;
      }
      dt.column(columnIndex).visible($(this).is(':checked'));
    });
  }
});
</script>