<section id="organizations" class="team section">
    <div class="container section-title" data-aos="fade-up">
      <h2>Struktur Organisasi</h2>
      <p>Tim Hebat Kami</p>
    </div>

    <div class="container">
      <div class="org-chart">
        {!! $organizationTreeHtml !!}
      </div>
    </div>
  </section>


  <style>
  .org-chart ul {
    padding-top: 20px;
    position: relative;
    list-style: none;
    margin: 0;
  }

  .org-chart ul::before {
    content: '';
    position: absolute;
    top: 0;
    left: 50%;
    border-left: 1px solid #d0d0d0;
    height: 20px;
    transform: translateX(-50%);
  }

  .org-chart li {
    display: table-cell;
    position: relative;
    padding: 0 12px;
    text-align: center;
    vertical-align: top;
  }

  .org-chart li::before,
  .org-chart li::after {
    content: '';
    position: absolute;
    top: 0;
    border-top: 1px solid #d0d0d0;
    width: 50%;
    height: 20px;
  }

  .org-chart li::before {
    left: 0;
    border-right: 1px solid #d0d0d0;
  }

  .org-chart li::after {
    right: 0;
    border-left: 1px solid #d0d0d0;
  }

  .org-chart li:only-child::before,
  .org-chart li:only-child::after {
    display: none;
  }

  .org-chart li:first-child::before {
    border: none;
  }

  .org-chart li:last-child::after {
    border: none;
  }

  .member-card {
    display: inline-block;
    background: #ffffff;
    padding: 12px;
    border: 1px solid #e0e0e0;
    border-radius: 6px;
    width: 140px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
    transition: transform 0.2s ease;
  }

  .member-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.08);
  }

  .member-card img {
    width: 55px;
    height: 55px;
    border-radius: 50%;
    object-fit: cover;
    margin-bottom: 8px;
  }

  .member-card .name {
    font-size: 13px;
    font-weight: 600;
    margin: 0;
    color: #333;
  }

  .member-card .title {
    font-size: 12px;
    color: #777;
    margin: 2px 0 8px 0;
  }

  .member-card .social a {
    font-size: 12px;
    margin: 0 4px;
    color: #666;
    transition: color 0.2s;
  }

  .member-card .social a:hover {
    color: #007bff;
  }
</style>

<style>
    .org-chart ul {
      padding-top: 20px;
      position: relative;
      list-style: none;
      margin: 0;
    }

    .org-chart ul::before {
      content: '';
      position: absolute;
      top: 0;
      left: 50%;
      border-left: 1px solid #ddd;
      height: 20px;
      transform: translateX(-50%);
    }

    .org-chart li {
      display: table-cell;
      position: relative;
      padding: 0 12px;
      text-align: center;
      vertical-align: top;
    }

    .org-chart li::before,
    .org-chart li::after {
      content: '';
      position: absolute;
      top: 0;
      border-top: 1px solid #ddd;
      width: 50%;
      height: 20px;
    }

    .org-chart li::before {
      left: 0;
      border-right: 1px solid #ddd;
    }

    .org-chart li::after {
      right: 0;
      border-left: 1px solid #ddd;
    }

    .org-chart li:only-child::before,
    .org-chart li:only-child::after,
    .org-chart ul:only-child::before {
      display: none;
    }

    .org-chart li:first-child::before {
      border: none;
    }

    .org-chart li:last-child::after {
      border: none;
    }

    .member-card {
      display: inline-block;
      background: #ffffff;
      padding: 12px;
      border: 1px solid #e0e0e0;
      border-radius: 10px;
      width: 140px;
      box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
      transition: all 0.2s ease;
    }

    .member-card:hover {
      transform: translateY(-3px);
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.08);
    }

    .member-card img {
      width: 60px;
      height: 60px;
      border-radius: 50%;
      object-fit: cover;
      margin-bottom: 8px;
    }

    .member-card .name {
      font-size: 14px;
      font-weight: 600;
      color: #333;
      margin: 0;
    }

    .member-card .title {
      font-size: 12px;
      color: #666;
      margin: 0 0 8px 0;
    }

    .member-card .social a {
      font-size: 14px;
      margin: 0 4px;
      color: #888;
      transition: color 0.2s;
    }

    .member-card .social a:hover {
      color: #007bff;
    }

    /* Optional: Responsive Horizontal Scroll for Mobile */
    @media (max-width: 768px) {
      .org-chart {
        overflow-x: auto;
        padding-bottom: 20px;
      }

      .org-chart ul {
        display: table;
        margin: 0 auto;
      }

      .org-chart li {
        display: table-cell;
      }
    }
  </style>
